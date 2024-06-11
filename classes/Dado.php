<?php

class Dado
{
  private $id;
  private $name;
  private $number;

  public function __construct($name, $number)
  {
    $this->name = $name;
    $this->number = $number;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getNumber()
  {
    return $this->number;
  }

  public function setNumber($number)
  {
    $this->number = $number;
  }
}