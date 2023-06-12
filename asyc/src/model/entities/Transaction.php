<?php

require_once (dirname(__FILE__)."/../lib/Crud.php");
require_once (dirname(__FILE__)."/../lib/Regex.php");

class Transaction {
  private $_cost;
  private $_description;
  private $_transactionType;
  private $_cashFlow;
  private $_destinationAccount;
  private $_creditor;
  private $_category;
  private $_status;
  private $_priority;
  private $_formOfPayment;
  private $_isInstallment;
  private $_qtdeInstallment;
  private $_installmentPrice;
  private $_ammountPaid;
  private $_dueDate;

  public function wipeAllData() : void {
    foreach($this as $property => $_) {
      $this->$property = null;
    }
  }

  public function getAllData() : array {
    return [
      "cost" => $this->getCost(),
      "description" => $this->getDescription(),
      "transactionType" => $this->getTransactionType(),
      "destinationAccount" => $this->getDestinationAccount(),
      "creditor" => $this->getCreditor(),
      "category" => $this->getCategory(),
      "status" => $this->getStatus(),
      "priority" => $this->getPriority(),
      "formOfPayment" => $this->getFormOfPayment(),
      "isInstallment" => $this->getIsInstallment(),
      "qtdeInstallment" => $this->getQtdeInstallment(),
      "installmentPrice" => $this->getInstallmentPrice(),
      "dueDate" => $this->getDueDate()
    ];
  }

  private function getCost() : float|null {
    return $this->_cost;
  }

  private function getDescription() : string|null {
    return $this->_description;
  }

  private function getTransactionType() : bool|null {
    return $this->_transactionType;
  }

  private function getCashFlow() : bool|null {
    return $this->_cashFlow;
  }

  private function getDestinationAccount() : string|null {
    return $this->_destinationAccount;
  }

  private function getCreditor() : string|null {
    return $this->_creditor;
  }

  private function getCategory() : string|null {
    return $this->_category;
  }

  private function getStatus() : int|null {
    return $this->_status;
  }

  private function getPriority() : int|null {
    return $this->_priority;
  }

  private function getFormOfPayment() : string|null {
    return $this->_formOfPayment;
  }

  private function getIsInstallment() : bool|null {
    return $this->_isInstallment;
  }

  private function getQtdeInstallment() : int|null {
    return $this->_qtdeInstallment;
  }

  private function getInstallmentPrice() : float|null {
    return $this->_installmentPrice;
  }

  private function getAmmountPaid() : float|null {
    return $this->ammountPaid;
  }

  private function getDueDate() : DateTime|null {
    return $this->_dueDate;
  }

  private function setCost($cost) : void {
    $this->_cost = Regex::evaluate($cost, "/^[+-]?([0-9]*[.])?[0-9]+$/"); 
  }

  private function setDescription($description) : void {
    $this->_description = Regex::evaluate($description, "/^[\p{Lu}\p{Ll}\p{M}+-,!\s\.'0-9]+$/u");
  }

  private function setTransactionType($transctionType) : void {
    $this->_transctionType = Regex::evaluate($transactionType,  "/^[\p{Ll}\p{Lu}\p{M}]+$/");
  }

  private function setCashFlow($cashFlow) : void {
    $this->_cashFlow = $cashFlow ?? false;
  }

  private function setDestinationAccount($destinationAccount) : void {
    $this->_destinationAccount = Regex::evaluate($destinationAccount,  "/^[\p{Ll}\p{Lu}\p{M}\]+$/");
  }

  private function setCreditor($creditor) : void {
    $this->_creditor = Regex::evaluate($creditor,  "/^[\p{Ll}\p{Lu}\p{M}\s]?$/");
  }

  private function setCategory($category) : void {
    $this->_category = Regex::evaluate($category,  "/^[\p{Ll}\p{Lu}\p{M}\s]+$/");
  }

  private function setStatus($status) : void {
    $this->_status = Regex::evaluate($status,  "/^[0-9]+$/");
  }

  private function setPriority($priority) : void {
    $this->_priority = Regex::evaluate($priority, "/^[0-9]+$/");
  }

  private function setFormOfPayment($formOfPayment) : void {
    $this->_formOfPayment = Regex::evaluate($formOfPayment, "/^[a-zA-Z]+$/");
  }

  private function setIsInstallment($isInstallment) : void {
    $this->_isInstallment = $isInstallment ?? false;
  }

  private function setQtdeInstallment($qtdeInstallment) : void {
    $this->_qtdeInstallment = Regex::evaluate($qtdeInstallment, "/^[0-9]$/");
  }

  private function setInstallmentPrice($installmentPrice) : void {
    $this->_installmentPrice = Regex::evaluate($installmentPrice, "/^[+-]?([0-9]*[.])?[0-9]?$/");
  }

  private function setAmmountPaid($ammountPaid) : void {
    $this->_ammountPaid = Regex::evaluate($ammoutPaid, "/^[+-]?([0-9]*[.])?[0-9]?$/");
  }

  private function setDueDate($dueDate) : void {
    $this->_dueDate = $dueDate->format("m-d-Y");
  }

  public function register($cost, $description, $transactionType, $cashFlow, $destinationAccount, $creditor, $category, $status, $piority, $formOfPayment, $isInstallment, $qtdeInstallment, $installmentPrice, $ammountPaid) : void {
    $this->setCost($cost);
    $this->setDescription($description);
    $this->setTransactionType($transactionType);
    $this->setCashFlow($cashFlow);
    $this->setDestinationAccount($destinationAccount);
    $this->setCreditor($creditor);
    $this->setCategory($category);
    $this->setStatus($status);
    $this->setPriority($priority);
    $this->setFormOfPayment($formOfPayment);
    $this->setIsInstallment($isInstallment);
    $this->setQtdeInstallment($qtdeInstallment);
    $this->setInstallmentPrice($installmentPrice);
    $this->setAmmountPaid($ammountPaid);    
  }

  public function __construct() { Grid::getConnection(); }
}
