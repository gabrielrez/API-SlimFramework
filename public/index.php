<?php

use Slim\Factory\AppFactory;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require dirname(__DIR__) . '/vendor/autoload.php';
require_once '../config/Conexao.php';
require_once '../classes/Dado.php';
require_once '../classes/DadoDAO.php';

$app = AppFactory::create();

$app->get('/dados', function (Request $request, Response $response, array $args) {
  $dadoDAO = new DadoDAO;
  $dados = $dadoDAO->read();
  $response->getBody()->write(json_encode($dados));
  return $response->withHeader('Content-Type', 'application/json');
});

$app->run();