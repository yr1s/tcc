<?php

require_once (dirname(__FILE__)."/../lib/Crud.php");
require_once (dirname(__FILE__)."/../lib/Regex.php");

class Product {
  private $_salePrice;
  private $_description;
  private $_model;
  private $_brand;
  private $_productCode;
  private $_barcode;
  private $_weight;
  private $_validity;

  public function getAllData() : array {
    return [
      "salePrice" => $this->getSalePrice(),
      "description" => $this->getDescription(),
      "model" => $this->getModel(),
      "brand" => $this->getBrand(),
      "productCode" => $this->getProductCode(),
      "barcode" => $this->getBarcode(),
      "weight" => $this->getWeight(),
      "validity" => $this->getValidity()
    ];
  }

  public function wipeAllData() : void {
    foreach($this as $property => $_) {
      $this->$property = null;
    }
  }

  private function getSalePrice() : float|null {
    return $this->_salePrice;
  }

  private function getDescription() : string|null {
    return $this->_description;
  }

  private function getModel() : string|null {
    return $this->_model;
  }

  private function getBrand() : string|null {
    return $this->_brand;
  }

  private function getProductCode() : string|null {
    return $this->_productCode;
  }

  private function getBarcode() : string|null {
    return $this->_barcode;
  }

  private function getWeight() : float|null {
    return $this->_weight;
  }

  private function getValidity() : int|null {
    return $this->_validity;
  }

  private function setSalePrice($salePrice) : void {
    $this->_salePrice = Regex::validate($salePrice, "/^[+-]?([0-9]*[.]?)[0-9]+$/");
  }

  private function setDescription($description) : void {
    $this->_description = Regex::validate($description, "/^[\p{Ll}\p{Lu}\p{M}\s\.]+$/");
  }

  private function setModel($model) : void {
    $this->_model = Regex::validate($model, "/^[\p{Ll}\p{Lu}\p{M}\s]+$/");
  }

  private function setBrand($brand) : void {
    $this->_brand = Regex::validate($brand, "/^[\p{Ll}\p{Lu}\p{M}\s]+$/");
  }

  private function setProductCode($productCode) : void {
    $this->_productCode = Regex::validate($productCode, "/^[a-z0-9]+$/");
  }

  private function setBarcode($barcode) : void {
    $this->_barcode = Regex::validate($barcode, "/^[0-9]?$/");
  }

  private function setWeight($weight) : void {
    $this->_weight = Regex::validate($weight, "/^[+-]?([0-9]*[.])?[0-9]?$/");
  }

  private function setValidity($validity) : void {
    $this->_validity = Regex::validate($validity, "/^[0-9]?$/");
  }

  public function register($salePrice, $description, $model, $brand, $productCode, $barcode, $weight, $validity) : void {
    $this->setSalePrice($salePrice);
    $this->setDescription($description);
    $this->setModel($model);
    $this->setBrand($brand);
    $this->setProductCode($productCode);
    $this->setBarcode($barcode);
    $this->setWeight($weight);
    $this->setValidity($validity);

    Crud::create(get_class($this), $this->getAllData());
  }

  public function __construct() { Crud::getConnection(); }
}
