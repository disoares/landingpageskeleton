<?php
session_start();
require_once('vendor/autoload.php');
require_once('src/config/config.php');

use App\model\LoadTpl;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\App as App;

$app = new App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

$app->get('/', function (Request $request, Response $response, array $args) {
    $tpl = new LoadTpl('index');
});

/****** APP RUN ******/
$app->run();
