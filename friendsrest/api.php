<?php

session_start();
require_once 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('main');
$log->pushHandler(new StreamHandler('logs/everything.log', Logger::DEBUG));
$log->pushHandler(new StreamHandler('logs/errors.log', Logger::ERROR));

DB::$user = 'friendsrest';
DB::$dbName = 'friendsrest';
DB::$password = 'Y59TrRNgHUIPtX2j';
DB::$port = 3306;
DB::$host = 'localhost';
DB::$encoding = 'utf8';
DB::$error_handler = 'db_error_handler';

function db_error_handler($params) {
    global $app, $log;
    $log->error("SQL error: " . $params['error']);
    $log->error("SQL query: " . $params['query']);
    http_response_code(500);
    header('content-type: application/json');
    echo json_encode("500 - internal error");
    die; // don't want to keep going if a query broke
}

// Slim creation and setup
$app = new \Slim\Slim();

$app->response()->header('content-type', 'application/json');

\Slim\Route::setDefaultConditions(array(
    'id' => '\d+'
));

$app->get('/friends', function() use ($app, $log) {
    $friendList = DB::query("SELECT * FROM friends");
    echo json_encode($friendList, JSON_PRETTY_PRINT);
});

$app->get('/friends/:id', function($id) use ($app, $log) {
    $friend = DB::queryFirstRow("SELECT * FROM friends WHERE id=%i", $id);
    echo json_encode($friend, JSON_PRETTY_PRINT);
});

$app->post('/friends', function() use ($app, $log) {
    $json = $app->request()->getBody();
    $friend = json_decode($json, true); // true to force it to return associative array
    $result = isTodoValid($friend);
    if ($result !== TRUE) {
        $log->err("POST /friends failed: " . $result);
        $app->response()->status(400);
        echo json_encode($result);
        return;
    }
    DB::insert('friends', $friend);
    $app->response()->status(201);
    echo json_encode(DB::insertId());
});

$app->put('/friends/:id', function($id) use ($app, $log) {
    $json = $app->request()->getBody();
    $friend = json_decode($json, true); // true to force it to return associative array
    $result = isTodoValid($friend);
    if ($result !== TRUE) {
        $log->err("POST /friends failed: " . $result);
        $app->response()->status(400);
        echo json_encode($result);
        return;
    }
    $existing = DB::queryOneRow("SELECT * FROM friends WHERE id=%i", $id);
    if (!$existing) {
        $app->response()->status(404);
        echo json_encode(false);
    } else {
        DB::update('friends', $friend, 'id=%i', $id);
        $log->debug(sprintf("PUT /friends/%s succeeded", $id));
        echo json_encode(true);
    }
});

$app->delete('/friends/:id', function($id) use ($app, $log) {
    DB::delete('friends', 'id=%i', $id);
    echo json_encode(DB::affectedRows() != 0);
});

$app->run();