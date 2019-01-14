<?php

session_start();
require_once 'vendor/autoload.php';

DB::$user = 'slimtodo';
DB::$password = 'swPyKG6tpy02oyXH';
DB::$dbName = 'slimtodo';
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
$app->run();