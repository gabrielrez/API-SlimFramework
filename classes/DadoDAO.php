<?php

require_once '../config/Conexao.php';
require_once '../classes/Dado.php';

class DadoDAO
{
  public function create(Dado $dado)
  {
    $conn = Conexao::getConn();
    $stmt = $conn->prepare("INSERT INTO dado ('name', 'number') VALUES (?, ?)");
    $stmt->bindValue(1, $dado->getName());
    $stmt->bindValue(2, $dado->getNumber());
    $stmt->execute();
  }

  public function read()
  {
    $conn = Conexao::getConn();
    $stmt = $conn->prepare("SELECT * FROM dado");
    $stmt->execute();
    $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    return $res;
  }
}