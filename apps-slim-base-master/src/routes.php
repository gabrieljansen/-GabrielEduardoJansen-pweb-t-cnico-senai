<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {

  $container = $app->getContainer();

  $app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
    // Sample log message
    $container->get('logger')->info("Slim-Skeleton '/' route");

    // Render index view
    return $container->get('renderer')->render($response, 'index.phtml', $args);
  });

  $app->post('/inserir/', function (Request $request, Response $response, array $args) use ($container) {
    // Sample log message
    $container->get('logger')->info("Slim-Skeleton '/' route");

    $params = $request->getParsedBody();
    $modelo = $params['modelo'];
    $marca = $params['marca'];
    $ano = $params['ano'];
    $conexao = $container->get('pdo');

        $result = $conexao->query('INSERT INTO carro  (modelo, marca, ano) 
                                   VALUES ( "'. $params['modelo'] .'",   "'.  $params['marca'] .'",   "'.  $params['ano'] .'")');
       
       

       
       return $response->withRedirect('/listar/');
   

  });

};
