<?php

session_start();
require_once 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('main');
$log->pushHandler(new StreamHandler('logs/everything.log', Logger::DEBUG));
$log->pushHandler(new StreamHandler('logs/errors.log', Logger::ERROR));

DB::$user = 'todorest';
DB::$dbName = 'todorest';
DB::$password = 'cNr54Drcl6C57Tmb';
DB::$port = 3333;
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


$app->get('/todos', function() use ($app, $log) {
    $todoList = DB::query("SELECT *** FROM todos");
    echo json_encode($todoList, JSON_PRETTY_PRINT);
});

$app->get('/todos/:id', function($id) use ($app, $log) {
    $todo = DB::queryFirstRow("SELECT * FROM todos WHERE id=%i", $id);
    echo json_encode($todo, JSON_PRETTY_PRINT);
});

$app->post('/todos', function() use ($app, $log) {
    $json = $app->request()->getBody();
    $todo = json_decode($json, true); // true to force it to return associative array
    $result = isTodoValid($todo);
    if ($result !== TRUE) {
        $log->err("POST /todos failed: " . $result);
        $app->response()->status(400);
        echo json_encode($result);
        return;
    }
    DB::insert('todos', $todo);
    $app->response()->status(201);
    echo json_encode(DB::insertId());
});

$app->put('/todos/:id', function($id) use ($app, $log) {
    $json = $app->request()->getBody();
    $todo = json_decode($json, true); // true to force it to return associative array
    $result = isTodoValid($todo);
    if ($result !== TRUE) {
        $log->err("POST /todos failed: " . $result);
        $app->response()->status(400);
        echo json_encode($result);
        return;
    }
    $existing = DB::queryOneRow("SELECT * FROM todos WHERE id=%i", $id);
    if (!$existing) {
        $app->response()->status(404);
        echo json_encode(false);
    } else {
        DB::update('todos', $todo, 'id=%i', $id);
        $log->debug(sprintf("PUT /todos/%s succeeded", $id));
        echo json_encode(true);
    }
});

$app->delete('/todos/:id', function($id) use ($app, $log) {
    DB::delete('todos', 'id=%i', $id);
    echo json_encode(DB::affectedRows() != 0);
});

// returns TRUE if todo is valid, otherwise a string describing the problem
function isTodoValid($todo) {
    if (is_null($todo)) {
        return "JSON parsing failed";
    }
    if (count($todo) != 3) {
        return "Invalid number of values";
    }
    if (!isset($todo['task']) || !isset($todo['dueDate']) || !isset($todo['isDone'])) {
        return "Required field missing";
    }
    if (strlen($todo['task']) < 1 || strlen($todo['task']) > 100) {
        return "Task must be 1-100 characters long";
    }
    if (date("Y-m-d", strtotime($todo['dueDate'])) != $todo['dueDate']) {
        return "Date format is invalid";
    }
    if ($todo['isDone'] != 'true' && $todo['isDone'] != 'false') {
        return "isDone must be true or false";
    }
    return TRUE;
}

$app->run();