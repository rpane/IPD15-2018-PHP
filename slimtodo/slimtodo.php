<?php

session_start();
require_once 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('main');
$log->pushHandler(new StreamHandler('logs/everything.log', Logger::DEBUG));
$log->pushHandler(new StreamHandler('logs/errors.log', Logger::ERROR));


DB::$user = 'slimtodo';
DB::$password = 'swPyKG6tpy02oyXH';
DB::$dbName = 'slimtodo';
DB::$port = 3333; //School
//DB::$port = 3306;//Home
DB::$host = 'localhost';
DB::$encoding = 'utf8';
DB::$error_handler = 'db_error_handler';

function db_error_handler($params) {
    global $app, $log;
    $log->error("SQL Error: " . $params['error']);
    $log->error("SQL Query: " . $params['query']);
    http_response_code(500);
    $app->render('fatal_error.html.twig');
    die; // don't want to keep going if a query broke
}

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

$app->get('/:action(/:id)', function($action, $id = -1) use ($app, $log) {
    if (($action == 'add' && $id != -1) || ($action == 'edit' && $id == -1)) {
        $app->notFound();
        return;
    }
    //
    if ($action == 'edit') {
        $todo = DB::queryFirstRow("SELECT *** FROM todos WHERE id=%i", $id);
        if (!$todo) {
            $app->notFound();
            return;
        }
        $log->debug("Preparing to edit todo with id=" . $id);
        $app->render('addedit.html.twig', array(
            'action' => 'edit',
            'v' => $todo)
        );
    } else {
        $app->render('addedit.html.twig', array('action' => 'add'));
    }
})->conditions(array('action' => '(add|edit)', 'id' => '[0-9]+'));


$app->post('/:action(/:id)', function($action, $id = -1) use ($app, $log) {
    if (($action == 'add' && $id != -1) || ($action == 'edit' && $id == -1)) {
        $app->notFound();
        return;
    }
    //
    // var_dump($_POST);
    $task = $app->request()->post('task');
    $dueDate = $app->request()->post('dueDate');
    $isDone = $app->request()->post('isDone', 'false');
    //
    $errorList = array();
    if (strlen($task) < 1 || strlen($task) > 100) {
        array_push($errorList, "Task must be 1-100 characters long");
    }
    if (date("Y-m-d", strtotime($dueDate)) != $dueDate) {
        array_push($errorList, "Date format is invalid");
    }
    //
    if (!$errorList) {
        if ($action == 'add') {

            DB:: insert('todos', array(
                'task' => $task,
                'dueDate' => $dueDate,
                'isDone' => $isDone
            ));
            $log->debug("Adding todo with new id=" . $id);
            $app->render('todoadd_success.html.twig');
        } else {
            if ($action == 'edit') {
                DB:: update('todos', array(
                    'task' => $task,
                    'dueDate' => $dueDate,
                    'isDone' => $isDone)
                        , 'id = %s', $id);
            }
            $log->debug("Updating todo with id=" . $id);
            $app->render('todoedit_success.html.twig');
        }
    } else {
        echo "failed";
    }
})->conditions(array('action' => '(add|edit)', 'id' => '[0-9]+'));

/*
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

  $app->get('/edit/:id', function() use ($app){
  $app->render('editTodo.html.twig');
  });
 */


$app->run();
