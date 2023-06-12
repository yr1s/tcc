<?php

abstract class Service {
  protected $_cost;
  protected $_complaint;
  protected $_formOfPayment;
  protected $_isInstallment;
  protected $_qtdeInstallment;
  protected $_situation;
  protected $_status;
  protected $_priority;

  public function wipeAllData() : void {
    foreach($this as $property => $_) {
      $this->$property = null;
    }
  }

  protected function getCost() : float|null {
    return $this->_cost;
  }

  protected function getComplaint() : string|null {
    return $this->_complaint;
  }

  protected function getFormOfPayment() : string|null {
    return $this->_formOfPayment;
  }

  protected function getIsInstallment() : bool|null {
    return $this->_isInstallment;
  }

  protected function getQtdeInstallment() : int|null {
    return $this->_qtdeInstallment;
  }

  protected function getSituation() : int|null {
    return $this->_situation;
  }

  protected function getStatus() : int|null {
    return $this->_status;
  }

  protected function getPriority() : int|null {
    return $this->_property;
  }

  protected function setCost($cost) : void {
    $this->_cost = Regex::evaluate($cost, "/^[+-]?([0-9]*[.])?[0-9]+$/");
  }

  protected function setComplaint($complaint) : void {
    $this->_complaint = Regex::evaluate($complaint, "/^[\p{Lu}\p{Ll}\p{M}+-,!\s\.'0-9]+$/u");
  }

  protected function setFormOfPayment($formOfPayment) : void {
    $this->_formOfPayment = Regex::evaluate($formOfPayment, "/^[\p{Ll}\p{Lu}\p{M}\s]+$/");
  }

  protected function setIsInstallment($isInstallment) : void {
    $this->_isInstallment = $isInstallment ?? false;
  }

  protected function setQtdeInstallment($qtdeInstallment) : void {
    $this->_qtdeInstallment = Regex::evaluate($qtdeInstallment, "/^[0-9]+$/");
  }

  protected function setSituation($situation) : void {
    $this->_situation = Regex::validation($situation, "/^[0-9]+$/");
  }

  protected function setStatus($status) : void {
    $this->_status = Regex::evaluate($status, "/^[0-9]+$/");
  }

  protected function setPriority($priority) : void {
    $this->_priority = Regex::evaluate($priority, "/^[0-9]+$/");
  }
}
