<?php

require_once (dirname(__FILE__)."/../lib/Crud.php");
require_once (dirname(__FILE__)."/../lib/Regex.php");

class Vehicle {
  private $_model;
  private $_brand;
  private $_color;
  private $_licensePlate;
  private $_mileage;
  private $_description;

  public function getAllData() : array {
    return [
      "model" => $this->getModel(),
      "brand" => $this->getBrand(),
      "color" => $this->getColor(),
      "licensePlate" => $this->getLicensePlate(),
      "mileage" => $this->getMileage(),
      "description" => $this->getDescription()
    ];
  }

  public function wipeAllData() : void {
    foreach($this as $property => $_) {
      $this->$property = null;
    }
  }

  private function getModel() {
    return $this->_model;
  }

  private function getBrand() {
    return $this->_brand;
  }

  private function getColor() {
    return $this->_color;
  }

  private function getLicensePlate() {
    return $this->_licensePlate;
  }

  private function getMileage() {
    return $this->_mileage;
  }

  private function getDescription() {
    return $this->_description;
  }

  private function setModel($model) : void {
    $this->_model = Regex::validate($model, "/^[\p{Ll}\p{Lu}\p{M}\s\.]+$/");
  }

  private function setBrand($brand) : void {
    $this->_brand = Regex::validate($brand, "/^[\p{Ll}\p{Lu}\p{M}0-9\s\.]+$/");
  }

  private function setColor($color) : void {
    $this->_color = Regex::validate($color, "/^[\p{Ll}\p{Lu}\p{M}\s]+$/");
  }

  private function setLicensePlate($licensePlate) : void {
    $this->_licensePlate = $Regex::validate($licensePlate, "/^([\p{Lu}0-9]{7})+$/");
  }

  private function setMileage($mileage) : void {
    $this->_mileage = Regex::validate($mileage, "/^[+-]?([0-9]*[.])?[0-9]+$/");
  }

  private function setDescription($description) : void {
    $this->_description = Regex::validate($description, "/^[\p{Ll}\p{Lu}\p{M}\s\.]+$/");
  }

  public function register($model, $brand, $color, $licensePlate, $mileage, $description) : void {
    $this->setModel($model);
    $this->setBrand($brand);
    $this->setColor($color);
    $this->setLicensePlate($licensePlate);
    $this->setMileage($mileage);
    $this->setDescription($description);

    Crud::create(get_class($this), $this->getAllData());
  }

  public function __construct() { Crud::getConnection(); }
}
