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
// send json data
$app->get("/API/sendsimplejson/{firstname}/{lastname}",function(Request $Request,Response $Response,$args){
    $firstname     = $args['firstname'];
    $lastname = $args['lastname'];
    $SendData = [];
    $SendData['status']=200;
    $SendData['messsage']="send simple json";
    $SendData['data']=[];
    $SendData['data']['firstname']=$firstname;
    $SendData['data']['lastname'] =$lastname;
    $Response->getBody()->write(json_encode($SendData));
});
$app->run();
