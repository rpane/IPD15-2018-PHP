<?php

session_start();
require_once 'vendor/autoload.php';

DB::$user = 'slimblog';
DB::$password = 'Cwg7tVdISaAkHa9A';
DB::$dbName = 'slimblog';
DB::$port = 3333;//School
//DB::$port = 3306;//Home
DB::$host = 'localhost';
DB::$encoding = 'utf8';

// Slim creation and setup
$app = new \Slim\Slim(array(
    'view' => new \Slim\Views\Twig()
        ));

$view = $app->view();
$view->parserOptions = array(
    'debug' => true,
    'cache' => dirname(__FILE__) . '/cache'
);
$view->setTemplatesDirectory(dirname(__FILE__) . '/templates');

$app->get('/isemailregistered/(:email)', function($email = "") use ($app){
$user = DB::queryFirstRow("SELECT * FROM users WHERE email=%s", $email);
echo ($user) ? "Email already in use" : "";    
});

$app->get('/register', function() use ($app) {
//State 1: First Show
    $app->render('register.html.twig');
});

$app->post('/register', function() use ($app) {
//Receieving Submission
    $email = $app->request()->post('email');
    $password = $app->request()->post('pass1');
    $password2 = $app->request()->post('pass2');
    $valueList = array('email' => $email, 'pass1' => $password, 'pass2' => $password2);

    //Verify submission
    $errorList = array();
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
        array_push($errorList, "Email is invalid");
        unset($valueList['email']);
    }

    if ($password != $password2 || $password == "") {
        array_push($errorList, "Passwords must be identical and not empty");
        unset($valueList['pass1']);
        unset($valueList['pass2']);
    }

    if (strlen($password) < 6) {
        array_push($errorList, "Password must be at least 6 characters long");
        unset($valueList['pass1']);
        unset($valueList['pass2']);
    }

    if (!$errorList) {
        //state 2: successful submission

        DB:: insert('users', array(
            'email' => $email,
            'password' => $password
        ));
        $app->render('register_success.html.twig');
    } else {
        //State 3: failed submission
        $app->render('register.html.twig', array(
            'errorList' => $errorList, 'v' => $valueList
        ));
    }
});

$app->get('/login', function() use ($app) {
//State 1: First Show
    $app->render('login.html.twig');
});

$app->post('/login', function() use ($app) {
    // receiving submission
    $email = $app->request()->post('email');
    $password = $app->request()->post('password');
    // verify submission
    $isLoginSuccessful = false;
    //
    $user = DB::queryFirstRow("SELECT * FROM users WHERE email=%s", $email);
    if ($user && ($user['password'] == $password)) {
        $isLoginSuccessful = true;
    }
    //
    if ($isLoginSuccessful) {
        // state 2: successful submission
        unset($user['password']);
        $_SESSION['user'] = $user;
        $app->render('login_success.html.twig');
    } else {
        // state 3: failed submission
        $app->render('login.html.twig', array('error' => true));
    }
});

$app->get('/logout', function() use ($app) {
    unset($_SESSION['user']);
    $app->render('logout.html.twig');
});

$app->get('/session', function() {
    echo "<pre>SESSION:\n\n";
    // var_dump($_SESSION);
    print_r($_SESSION);
});

$app->get('/articleadd', function() use ($app) {
     if (!isset($_SESSION['user'])) {
        echo "<p>Unauthorized, Login first</p>";
        exit;
    }
    $app->render('articleadd.html.twig');
});

$app->post('/articleadd', function() use ($app) {
   

//receiving submission
    $title = $app->request()->post('title');
    $body = $app->request()->post('body');
    $user = $_SESSION['user']['id'];
    $errorList = array();
    //Verify Submission
    if (strlen($title) < 2 || strlen($title) > 50) {
        array_push($errorList, "Title must be at least 2-50 characters long.");
    }
    if(strlen($body) < 2 || strlen($body) > 100){
         array_push($errorList, "Article must be at least 2-100 characters long.");
    }

    if (!$errorList) {
        //state 2: successful submission

        DB:: insert('articles', array(
            'authorId' => $user,
            'title' => $title,
            'body' => $body
        ));
        $app->render('articleadd_success.html.twig');
    } else {
        //State 3: failed submission
        $app->render('articleadd.html.twig', array(
            'errorList' => $errorList
        ));
    }
});
$app->get('/', function() use ($app) {
    $articleList = DB::query("SELECT a.id, a.creationTime, a.title, a.body, u.email authorName " .
                " FROM articles as a, users as u WHERE a.authorId = u.id");
    $app->render('index.html.twig', array('al' => $articleList));
});

$app->get('/article/:id', function($id) use ($app) {
    $article = DB::queryFirstRow("SELECT a.id, a.creationTime, a.title, a.body, u.email authorName " .
                " FROM articles as a, users as u WHERE a.authorId = u.id AND a.id=%s", $id);
    $app->render("article_view.html.twig", array('a' => $article));
});
$app->run();
