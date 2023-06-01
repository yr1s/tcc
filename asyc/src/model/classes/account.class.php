<?php

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

  private function getDescription() : string {
    return $this->_description;
  }

  private function getAccountType() : string {
    return $this->_accountType;
  }

  private function getStatus() : int {
    return $this->_status;
  }

  private function getOverallBalance() : float {
    return $this->_overallBalance;
  }

  private function getIncome() : float {
    return $this->_income;
  }

  private function getExpense() : float {
    return $this->_expense;
  }

  private function setDescription($description) : void {
    $this->_description = Regex::validate($description, "/^[\p{Ll}\p{Lu}\p{M}\s]+$/");
  }

  private function setAccountType($accountType) : void {
    $this->_accountType = Regex::validate($accountType, "/^[\p{Ll}\p{Lu}\p{M}\s]+$/");
  }

  private function setStatus($status) : void {
    $this->_status = Regex::validate($status, "/^[1-2]+$/");
  }

  private function setOverallBalance($overallBalance) : void {
    $this->_overallBalance = Regex::validate($overallBalance, "/^[+-]?([0-9]*[.])?[0-9]+$/");
  }

  private function setIncome($income) : void {
    $this->_income = Regex::validate($income, "/^[+-]?([0-9]*[.])?[0-9]+$/");
  }

  private function setExpense($expense) : void {
    $this->_expense = Regex::validate($expense, "/^[+-]?([0-9]*[.])?[0-9]+$/");
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
