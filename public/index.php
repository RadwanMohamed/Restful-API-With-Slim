<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->post('/API/first',function (Request $request,Response $response){
   $data = $request->getParsedBody();
   $var=[];
   $var['name'] = filter_var($data['name'],FILTER_SANITIZE_STRING);
   $var['phone'] = filter_var($data['phone'],FILTER_SANITIZE_STRING);
   $response->getBody()->write("welcome ".$var['name']."\n"."your phone ".$var['phone']);
});
$app->run();
