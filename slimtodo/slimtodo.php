<?php

session_start();
require_once 'vendor/autoload.php';

DB::$user = 'slimtodo';
DB::$password = 'swPyKG6tpy02oyXH';
DB::$dbName = 'slimtodo';
//DB::$port = 3333;//School
DB::$port = 3306;//Home
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

$app->get('/', function() use ($app) {
    $todoList = DB::query("SELECT * FROM todos");
    $app->render('todoList.html.twig', array('al' => $todoList));
});

$app->get('/add', function() use ($app){
    $app->render('todoadd.html.twig');
});

$app->post('/add', function() use ($app) {
   

//receiving submission
    $task = $app->request()->post('task');
    $dueDate = $app->request()->post('dueDate');
    $isDone = $app->request()->post('isDone');
    $errorList = array();
    //Verify Submission
    //Todo

    //Submission
    if (!$errorList) {
        //state 2: successful submission

        DB:: insert('todos', array(
            'task' => $task,
            'dueDate' => $dueDate,
            'isDone' => $isDone
        ));
        $app->render('todoadd_success.html.twig');
    } else {
        //State 3: failed submission
        $app->render('todoadd.html.twig', array(
            'errorList' => $errorList
        ));
    }
});


$app->run();