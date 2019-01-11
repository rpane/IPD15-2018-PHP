<?php
require_once 'vendor/autoload.php';

DB::$user = 'first';
DB::$password = 'QskUahNylkYIjOuu';
DB::$dbName = 'first';
DB::$port = 3333;
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

$app->get('/hello/:name', function ($name) {
    echo "Hello, " . $name;
});

$app->get('/hello/:name/:age', function ($name, $age) use ($app){
    //echo "Hello, " . $name." you are ".$age." y/o.";
    
    DB::insert('people',array(
        'name' => $name,
        'age' => $age
    ));
    $app->render('hello.html.twig', array(
        'name' => $name,
        'age' => $age
    ));
});

$app->get('/list', function(){
$peoplelist = DB::query("SELECT * FROM people");
print_r($peoplelist);
});

$app->get('/addme', function() use ($app){
//State 1: First Show
    $app->render('addme.html.twig');
});

$app->post('/addme', function() use ($app){
//Receieving Submission
    $name = $app ->request()->post('name');
    $age = $app ->request()->post('age');
    //Verify submission
    $errorList = array();
    if(strlen($name) < 2 || strlen($name) > 100){
        array_push($errorList,"Name must be between 2-100 characters");
    }
    if(!is_numeric($age) || $age <1 || $age > 150){
        array_push($errorList, "Age must be an integer in 1-150 range");
    }
    //
    if(!$errorList){
        //state 2: successful submission
        echo 'success';
    }else{
        //State 3: failed submission
        echo "failure";
    }
});
$app->run();