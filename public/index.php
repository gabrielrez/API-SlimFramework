<?php

use Slim\Factory\AppFactory;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require dirname(__DIR__) . '/vendor/autoload.php';
require_once '../config/Conexao.php';
require_once '../classes/Dado.php';
require_once '../classes/DadoDAO.php';

$app = AppFactory::create();
$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

// GET -- Retornar dados -- SELECT
// POST -- Inserir dados -- INSERT
// PUT -- Editar dados -- UPDATE
// DELETE -- Deletar dados -- DELETE

$app->get('/helloworld', function (Request $request, Response $response, array $args) {
  $response->getBody()->write("Hello World!");
  return $response;
});

$app->get('/dados', function (Request $request, Response $response, array $args) {
  $dadoDAO = new DadoDAO;
  $dados = $dadoDAO->read();
  $response->getBody()->write(json_encode($dados));
  return $response;
});

$app->post('/dados/add', function (Request $request, Response $response, array $args) {
  $data = $request->getParsedBody();
  $dado = new Dado($data['name'], $data['number']);
  $dadoDAO = new dadoDAO;
  $dadoDAO->create($dado);
});

$app->put('/dados/{id}', function (Request $request, Response $response, array $args) {
  $data = $request->getParsedBody();
  $dado = new Dado($data['name'], $data['number']);
  $dado->setId($args['id']);
  $dadoDAO = new DadoDAO;
  $dadoDAO->update($dado);
});

$app->delete('/dados/{id}', function (Request $request, Response $response, array $args) {
  $dadoDAO = new DadoDAO;
  $dadoDAO->delete($args['id']);
});

$app->run();