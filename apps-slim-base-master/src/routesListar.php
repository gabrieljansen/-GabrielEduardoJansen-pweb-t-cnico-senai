<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/listar/', function (Request $request, Response $response, array $args) use ($container) {

        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");


        $conexao = $container->get('pdo');

      

        $listar = $conexao->query('SELECT * FROM carro where id ')->fetchAll();

        $args['carro'] = $listar;

     
        // Render index view
        return $container->get('renderer')->render($response, 'index2.phtml', $args);


    });

};
