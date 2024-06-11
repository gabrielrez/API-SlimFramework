<?php

require_once '../config/Conexao.php';
require_once '../classes/Dado.php';

class DadoDAO
{
  public function create(Dado $dado)
  {
    $conn = Conexao::getConn();
    $stmt = $conn->prepare("INSERT INTO dado (name, number) VALUES (?, ?)");
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

  public function update(Dado $dado)
  {
    $stmt = Conexao::getConn()->prepare('UPDATE dado SET name = ?, number = ? WHERE id = ?');
    $stmt->bindValue(1, $dado->getName());
    $stmt->bindValue(2, $dado->getNumber());
    $stmt->bindValue(3, $dado->getId());
    $stmt->execute();
  }

  public function delete($id)
  {
    $conn = Conexao::getConn();
    $stmt = $conn->prepare("DELETE FROM dado WHERE id = ?");
    $stmt->bindValue(1, $id);
    $stmt->execute();
  }
}