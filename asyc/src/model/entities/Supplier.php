<?php

require_once (dirname(__FILE__)."/../lib/Crud.php");
require_once (dirname(__FILE__)."/../lib/Regex.php");
require_once (dirname(__FILE__)."/../lib/shared/Contact.php");

class Supplier extends Contact {
  private $_CNPJ;
  private $_description;

  public function getAllData() : array {
    return [
      "name" => $this->getName(),
      "telephone" => $this->getTelephone(),
      "cellphone" => $this->getCellphone(),
      "email" => $this->getEmail(),
      "cnpj" => $this->getCnpj(),
      "address" => $this->getAddress(),
      "cep" => $this->getCep(),
      "houseNumber" => $this->getHouseNumber(),
      "city" => $this->getCity(),
      "neighborhood" => $this->getNeighborhood(),
      "reference" => $this->getReference(),
      "description" => $this->getDescription()
    ];
  }

  private function getCnpj() : string|null {
    return $this->_CNPJ;
  }

  private function getDescription() : string|null {
    return $this->_description;
  }

  private function setCnpj($cnpj) : void {
    $this->_cnpj = Regex::evaluate($cnpj, "/^([0-9]{14})+$/");
  }

  private function setDescription($description) : void {
    $this->_description = Regex::evaluate($description, "/^[\p{Lu}\p{Ll}\p{M}+-,!\s\.'0-9]+$/u");
  }

  public function register($name, $telephone, $cellphone, $email, $cnpj, $address, $cep, $houseNumber, $city, $neighborhood, $reference, $description) : void {
    $this->setName($name);
    $this->setTelephone($telephone);
    $this->setCellphone($cellphone);
    $this->setEmail($email);
    $this->setCnpj($cnpj);
    $this->setAddress($address);
    $this->setCep($cep);
    $this->setHouseNumber($houseNumber);
    $this->setCity($city);
    $this->setNeighborhood($neighborhood);
    $this->setReference($reference);
    $this->setDescription($description);

    Crud::create(get_class($this), $this->getAllData());
  }

  public function __construct() { Crud::getConnection(); }
}
