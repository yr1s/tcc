<?php

require_once (dirname(__FILE__)."/../lib/Crud.php");
require_once (dirname(__FILE__)."/../lib/Regex.php");

class Account {
  private $_description;
  private $_accountType;
  private $_status;
  private $_overallBalance;
  private $_income;
  private $_expense;

  public function getAllData() : array {
    return [
      "description" => $this->getDescription(),
      "accountType" => $this->getAccountType(),
      "status" => $this->getStatus(),
      "overallBalance" => $this->getOverallBalance(),
      "income" => $this->getIncome(),
      "expense" => $this->getExpense()
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

  private function getAccountType() : string|null {
    return $this->_accountType;
  }

  private function getStatus() : int|null {
    return $this->_status;
  }

  private function getOverallBalance() : float|null {
    return $this->_overallBalance;
  }

  private function getIncome() : float|null {
    return $this->_income;
  }

  private function getExpense() : float|null {
    return $this->_expense;
  }

  private function setDescription($description) : void {
    $this->_description = Regex::evaluate($description, "/^[\p{Lu}\p{Ll}\p{M}+-,!\s\.'0-9]+$/u");
  }

  private function setAccountType($accountType) : void {
    $this->_accountType = Regex::evaluate($accountType, "/^[\p{Ll}\p{Lu}\p{M}\s]+$/");
  }

  private function setStatus($status) : void {
    $this->_status = Regex::evaluate($status, "/^[1-2]+$/");
  }

  private function setOverallBalance($overallBalance) : void {
    $this->_overallBalance = Regex::evaluate($overallBalance, "/^[+-]?([0-9]*[.])?[0-9]+$/");
  }

  private function setIncome($income) : void {
    $this->_income = Regex::evaluate($income, "/^[+-]?([0-9]*[.])?[0-9]+$/");
  }

  private function setExpense($expense) : void {
    $this->_expense = Regex::evaluate($expense, "/^[+-]?([0-9]*[.])?[0-9]+$/");
  }

  public function register($description, $accountType, $status, $overallBalance, $income, $expense) : void {
    $this->setDescription($description);
    $this->setAccountType($accountType);
    $this->setStatus($status);
    $this->setOverallBalance($overallBalance);
    $this->setIncome($income);
    $this->setExpense($expense);

    Crud::create(get_class($this), $this->getAllData());
  }

  public function __construct() { Crud::getConnection(); }
}
