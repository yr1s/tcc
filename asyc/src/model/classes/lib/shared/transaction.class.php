<?php

abstract class Transaction {
  private $_cost;
  private $_description;
  private $_transactionType;
  private $_destinationAccount;
  private $_creditor;
  private $_category;
  private $_status;
  private $_priority;
  private $_formOfPayment;
  private $_isInstallment;
  private $_qtdeInstallment;
  private $_installmentPrice;
  private $_dueDate;

  public function wipeAllData() : void {
    foreach($this as $property => $_) {
      $this->$property = null;
    }
  }

  public function getAllData() : aray {
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

  private function getCost() : float {
    return $this->_cost;
  }

  private function getDescription() : string {
    return $this->_description;
  }

  private function getTransactionType() : bool {
    return $this->_transactionType;
  }

  private function getDestinationAccount() : string {
    return $this->_destinationAccount;
  }

  private function getCreditor() : string {
    return $this->_creditor;
  }

  private function getCategory() : string {
    return $this->_category;
  }

  private function getStatus() : int {
    return $this->_status;
  }

  private function getPriority() : int {
    return $this->_priority;
  }

  private function getFormOfPayment() : string {
    return $this->_formOfPayment;
  }

  private function getIsInstallment() : bool {
    return $this->_isInstallment;
  }

  private function getQtdeInstallment() : int|null {
    return $this->_qtdeInstallment;
  }

  private function getInstallmentPrice() : float|null {
    return $this->_installmentPrice;
  }

  private function getDueDate() : DateTime {
    return $this->_dueDate;
  }

  private function setCost($cost) : void {
    $this->_cost = Regex::validate($cost, "/^[+-]?([0-9]*[.])?[0-9]+$/"); 
  }

  private function setDescription($description) : void {
    $this->_description = Regex::validate($description, "/^[\p{Ll}\p{Lu}\p{M}\s\.,]+$/");
  }

  private function setTransactionType($transctionType) : void {
    $this->_transctionType = Regex::validate($transactionType,  "/^[\p{Ll}\p{Lu}\p{M}]+$/");
  }

  private function setDestinationAccount($destinationAccount) : void {
    $this->_destinationAccount = Regex::validate($destinationAccount,  "/^[\p{Ll}\p{Lu}\p{M}\]+$/");
  }

  private function setCreditor($creditor) : void {
    $this->_creditor = Regex::validate($creditor,  "/^[\p{Ll}\p{Lu}\p{M}\s]?$/");
  }

  private function setCategory($category) : void {
    $this->_category = Regex::validate($category,  "/^[\p{Ll}\p{Lu}\p{M}\s]+$/");
  }

  private function setStatus($status) : void {
    $this->_status = Regex::validate($status,  "/^[0-9]+$/");
  }

  private function setPriority($priority) : void {
    $this->_priority = Regex::validate($priority, "/^[0-9]+$/");
  }

  private function setFormOfPayment($formOfPayment) : void {
    $this->_formOfPayment = Regex::validate($formOfPayment, "/^[a-zA-Z]+$/");
  }

  private function setIsInstallment($isInstallment) : void {
    $this->_isInstallment = $isInstallment ?? false;
  }

  private function setQtdeInstallment($qtdeInstallment) : void {
    $this->_qtdeInstallment = Regex::validate($qtdeInstallment, "/^[0-9]$/");
  }

  private function setInstallmentPrice($installmentPrice) : void {
    $this->_installmentPrice = Regex::validate($installmentPrice, "/^[+-]?([0-9]*[.])?[0-9]?$/");
  }

  private function setDueDate($dueDate) : void {
    $this->_dueDate = $dueDate->format("m-d-Y");
  }
}
