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

$app->run();