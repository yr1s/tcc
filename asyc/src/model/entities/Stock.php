<?php

require_once (dirname(__FILE__)."/../lib/Crud.php");
require_once (dirname(__FILE__)."/../lib/Regex.php");

class Stock {
  private $_description;
  private $_category;
  private $_qtdeProductsStored;
  private $_location;

  public function getAllData() : array {
    return [
      "description" => $this->getDescription(),
      "category" => $this->getCategory(),
      "qtdeProductsStored" => $this->getQtdeProductsStored(),
      "location" => $this->getLocation()
    ];
  }

  public function wipeAllData() : void {
    foreach($this as $property => $_) {
      $this->$property = null;
    }
  }

  private function getDescription() : string|null {
    return $this->_description;
  }

  private function getCategory() : string|null {
    return $this->_category;
  }

  private function getQtdeProductsStored() : int|null {
    return $this->_qtdeProductsStored;
  } 

  private function getLocation() : string|null {
    return $this->_location;
  }

  private function setDescription($description) : void {
    $this->_description = Regex::evaluate($description, "/^[\p{Lu}\p{Ll}\p{M}+-,!\s\.'0-9]+$/u");
  }

  private function setCategory($category) : void {
    $this->_category = Regex::evaluate($category, "/^[\p{Ll}\p{Lu}\p{M}\s]+$/");
  }

  private function setQtdeProductsStored($qtdeProductsStored) : void {
    $this->_qtdeProductsStored = Regex::evaluate($qtdeProductsStored, "/^[0-9]+$/");
  }

  private function setLocation($location) : void {
    $this->_location = Regex::evaluate($location, "/^[\p{Ll}\p{Lu}\p{M}\s]*$/");
  }

  public function register($description, $category, $qtdeProductsStored, $location) : void {
    $this->setDescription($description);
    $this->setCategory($category);
    $this->setQtdeProductsStored($qtdeProductsStored);
    $this->setLocation($location);

    Crud::create(get_class($this), $this->getAllData());
  }

  public function __construct() { Crud::getConnection(); }
}
