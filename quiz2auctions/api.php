<?php

session_start();
require_once 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('main');
$log->pushHandler(new StreamHandler('logs/everything.log', Logger::DEBUG));
$log->pushHandler(new StreamHandler('logs/errors.log', Logger::ERROR));

DB::$user = 'quiz2auctions';
DB::$dbName = 'quiz2auctions';
DB::$password = 'c7zeDojrHtIJjrWj';
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

$app->get('/auctions', function() use ($app, $log) {
    
    $sortBy = $app->request()->get('sortBy', 'id');
    // order by argument must not be quoted and must be sanitized by hand
    if (!in_array($sortBy, array('id', 'itemDesc', 'sellerEmail', 'lastBid', 'lastBidderEmail'))) {
        $log->err("GET /auctions failed due to invalid sortBy argument: " + $sortBy);
        $app->response()->status(400);
        echo json_encode(false);
        return;
    }
    $aucList = DB::query("SELECT * FROM auctions ORDER BY %l", $sortBy);
    echo json_encode($aucList, JSON_PRETTY_PRINT);
    
});

$app->get('/auctions/:id', function($id) use ($app, $log) {
    $auction = DB::queryFirstRow("SELECT * FROM auctions WHERE id=%i", $id);
    echo json_encode($auction, JSON_PRETTY_PRINT);
});

$app->post('/auctions', function() use ($app, $log) {
    $json = $app->request()->getBody();
    $auction = json_decode($json, true); // true to force it to return associative array
    $result = isAucValid($auction);
    if ($result !== TRUE) {
        $log->err("POST /auctions failed: " . $result);
        $app->response()->status(400);
        echo json_encode($result);
        return;
    }
    DB::insert('auctions', $auction);
    $app->response()->status(201);
    echo json_encode(DB::insertId());
});

$app->put('/auctions/:id', function($id) use ($app, $log) {
    $json = $app->request()->getBody();
    $auction = json_decode($json, true); // true to force it to return associative array
    $result = isAucValid($auction);
    if ($result !== TRUE) {
        $log->err("POST /auctions failed: " . $result);
        $app->response()->status(400);
        echo json_encode($result);
        return;
    }
    $existing = DB::queryOneRow("SELECT * FROM auctions WHERE id=%i", $id);
    if (!$existing) {
        $app->response()->status(404);
        echo json_encode(false);
    } else {
        DB::update('auctions', $auction, 'id=%i', $id);
        $log->debug(sprintf("PUT /auctions/%s succeeded", $id));
        echo json_encode(true);
    }
});


function isAucValid($auction) {
    if (is_null($auction)) {
        return "JSON parsing failed";
    }
    if (filter_var($auction['sellerEmail'], FILTER_VALIDATE_EMAIL) === FALSE) {
        return "Invalid Email";
    }
    if (strlen($auction['itemDesc']) < 1 || strlen($auction['itemDesc']) > 200) {
        return "Item description must be 1-200 characters long";
    }
    return TRUE;
}



$app->run();