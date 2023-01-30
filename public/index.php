<?php
//To install Slim => composer require slim/slim:"4.*"
//                => composer require slim/psr7

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->addBodyParsingMiddleware(); // important for post / put => $request->getParsedBody();

//Get----------------------------------
$app->get('/hello/{name}', function (Request $request, Response $response, $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello world!, $name");
    return $response;
});

//Post----------------------------------
$app->post('/post/test', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $id = $data['id'];
    $response->getBody()->write("Hello!, $id");
    return $response;
});

//Put----------------------------------
$app->put('/put', function (Request $request, Response $response) {
    $data = $request->getParsedBody(); // data that in the body of the post request
    $id = $data['id'];
    $response->getBody()->write("dear $id");
    return $response;
});

$app->run();
