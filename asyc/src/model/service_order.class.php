<?php

require_once 'lib/shared/service.class.php';

class ServiceOrder extends Service {
  private $_vehicle;
  private $_labours;
  private $_usedProducts;
  private $_responsibleTechnician;
  private $_technicalReport;
  private $_pickUpDate;
  private $_closingDate;

  public function getAllData() : array {
    return array_merge($_vehicle->getAllData(),
      [
        "cost" => $this->getCost(),
        "complaint" => $this->getComplaint(),
        "responsibleTechnician" => $this->getResponsibleTechnician(),
        "technicalReport" => $this->getTechnicalReport(),
        "situation" => $this->getSituation(),
        "status" => $this->getStatus(),
        "priority" => $this->getPriority(),
        "pickUpDate" => $this->getPickUpDate(),
        "closingDate" => $this->getClosingDate()
      ],

      ["labours" => $this->_labours],
      ["usedProducts" => $this->_usedProducts]
    );
  }

  private function getResponsibleTechnician() : string {
    return $this->_responsibleTechnician;
  }

  private function getTechnicalReport() : string {
    return $this->_technicalReport;
  }

  private function getPickUpDate() : DateTime|null {
    return $this->_pickUpDate;
  }

  private function getClosingDate() : DateTime {
    return $this->_closingDate;
  }

  private function setResponsibleTechnician($responsibleTechnician) {
    $this->_responsibleTechnician = Regex::validate($responsibleTechnician, "/^[\p{Ll}\p{Lu}\p{M}\s]+$/");
  } 

  private function setTechnicalReport($technicalReport) : void {
    $this->_technicalReport = Regex::validate($technicalReport, "/^[\p{Ll}\p{Lu}\p{M}\s\.,]+$/");
  }

  private function setPickUpDate($pickUpDate) : void {
    $this->_pickUpDate = $pickUpDate->format('m-d-Y');
  }

  private function setClosingDate($closingDate) : void {
    $this->_closingDate = $closingDate->format('m-d-Y');
  }

  public function register($cost, $complaint, $reponsibleTechnician, $technicalReport, $situation, $status, $priority, $pickUpDate, $closingDate) : void {
    $this->setCost($cost);
    $this->setComplaint($complaint);
    $this->setResponsibleTechnician($responsibleTechnician);
    $this->setTechnicalReport($technicalReport);
    $this->setSituation($situation);
    $this->setStatus($status);
    $this->setPriority($priority);
    $this->setPickUpDate($pickUpDate);
    $this->setClosingDate($closingDate);

    Crud::create(get_class($this), $this->getAllData());
  }

  public function __construct(Vehicle $vehicle, Array $labours, Array $usedProducts) {
    $this->_vehicle = $vehicle; 
    $this->_labours = $labours;
    $this->_usedProducts = $usedProducts;

    Crud::getConnection(); 
  }
}

class Labour {
  private $_cost;
  private $_labourType;
  private $_description;
  private $_responsibleTechnician;

  public function wipeAllData() : void {
    foreach($this as $property => $_) {
      $this->$property = null;
    }
  }

  public function getAllData() : array {
    return [
      "cost" => $this->getCost(),
      "labourType" => $this->getLabourType(),
      "description" => $this->getDescription(),
      "reponsibleTechnician" => $this->getResponsibleTechnician()
    ];
  }

  private function getCost() : float {
    return $this->_cost;
  }

  private function getLabourType() : bool {
    return $this->_labourType;
  }

  private function getDescription() : string {
    return $this->_description;
  }

  private function getResponsibleTechnician() : string {
    return $this->_responsibleTechnician;
  }

  private function setCost($cost) : void {
    $this->_cost = Regex::validate($cost, "/^[+-]?([0-9]*[.])?[0-9]+$/");
  }

  private function setLabourType($labourType) : void {
    $this->_labourType = $labourType ?? false;
  }

  private function setDescription($description) : void {
    $this->_description = Regex::validate($description, "/^[\p{Ll}\p{Lu}\p{M}\s\.]+$/");
  }

  private function setResponsibleTechnician($responsibleTechnician) {
    $this->_responsibleTechnician = Regex::validate($responsibleTechnician, "/^[\p{Ll}\p{Lu}\p{M}\s]+$/");
  } 

  public function register($cost, $labourType, $description, $responsibleTechnician) : void {
    $this->setCost($cost);
    $this->setLabouType($labourType);
    $this->setDescription($description);
    $this->setResponsibleTechnician($responsibleTechnician);

    Crud::create(get_class($this), $this->getAllData());   
  }
}

class UsedProduct {
  private $_cost;
  private $_usedProductType;
  private $_description;
  private $_productCode;
  private $_barcode;

  public function wipeAllData() : void {
    foreach($this as $property => $_) {
      $this->$property = null;
    }
  }

  public function getAllData() : array {
    return [
      "cost" => $this->getCost(),
      "usedProductType" => $this->getUsedProductType(),
      "description" => $this->getDescription(),
      "productCode" => $this->getProductCode(),
      "barcode" => $this->getBarcode()
    ];
  }

  private function getCost() : float {
    return $this->_cost;
  }

  private function getUsedProductType() : bool {
    return $this->_usedProductType;
  }

  private function getDescription() : string {
    return $this->_description;
  }

  private function getProductCode() : string|null {
    return $this->_productCode;
  }

  private function getBarcode() : string|null {
    return $this->_barcode;
  }

  private function setCost($cost) : void {
    $this->_cost = Regex::validate($cost, "/^[+-]?([0-9]*[.])?[0-9]+$/");
  }

  private function setUsedProductType($usedProductType) : void {
    $this->_usedProductType = $usedProductType ?? false;
  }

  private function setDescription($description) : void {
    $this->_description = Regex::validate($description, "/^[\p{Ll}\p{Lu}\p{M}\s\.]+$/");
  }

  private function setProductCode($productCode) : void {
    $this->_productCode = Regex::validate($productCode, "/^[a-z0-9]?$/");
  }

  private function setBarcode($barcode) : void {
    $this->_barcode = Regex::validate($barcode, "/^[0-9]?$/");
  }

  public function register($cost, $usedProductType, $description, $productCode, $barcode) : void {
    $this->setCost();
    $this->setUsedProductType();
    $this->setDescription();
    $this->setProductCode();
    $this->setBarcode();

    Crud::create(get_class($name), $this->getAllData());
  }
}
