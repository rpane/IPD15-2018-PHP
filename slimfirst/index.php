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
$app->run();