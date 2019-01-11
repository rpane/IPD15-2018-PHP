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
        DB::insert('people',array(
        'name' => $name,
        'age' => $age));
        $app->render('addme_success.html.twig');
    }else{
        //State 3: failed submission
        $app->render('addme.html.twig',array(
            'errorList' => $errorList
        ));
    }
});

$app->get('/random', function() use ($app){
//State 1: First Show
    $app->render('random.html.twig');
});

$app->post('/random', function() use ($app){
//Receieving Submission
    $min = $app ->request()->post('min');
    $max = $app ->request()->post('max');
    $count = $app ->request()->post('count');
    //Verify submission
    $
    $errorList = array();
    if($min > $max){
        array_push($errorList,"min must be less than max");
    }
    if(!is_numeric($min) || $min <1 ){
        array_push($errorList, "Min must be an integer above 1");
        
    }
    if(!is_numeric($max) || $max <1 ){
        array_push($errorList, "Max must be an integer above 1");
    }
    if(!is_numeric($count) || $count <1 ){
        array_push($errorList, "Count must be an integer above 1");
    }
    //
    if(!$errorList){
        //state 2: successful submission
        
        $value = rand($min, $max);
        $rndList = array();
        for ($i =0; $i <$count; $i++){
             $value = rand($min, $max);
             array_push($rndList, $value);
        }
        
        $app->render('random.html.twig',array('rndList' => $rndList            
        ));
        
    }else{
        //State 3: failed submission
        $app->render('random.html.twig',array(
            'errorList' => $errorList
        ));
    }
});

$app->run();