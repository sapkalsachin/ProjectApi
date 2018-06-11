<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../src/config/db.php';

$app = new \Slim\App;
$app->get('/', function (Request $request, Response $response, array $args) {
    // $name = 'sachin';//$args['name'];
    // $response->getBody()->write("Hello, $name");

    // return $response;

    echo'<h1 style="color:red;">Working</h1>';
});

require '../src/routes/emergency.php';

$app->run();
