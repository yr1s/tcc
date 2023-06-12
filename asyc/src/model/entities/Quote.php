<?php

require_once (dirname(__FILE__)."/../lib/Crud.php");
require_once (dirname(__FILE__)."/../lib/Regex.php");
require_once (dirname(__FILE__)."/../lib/shared/Service.php");

class Quote extends Service {
  private $_checklist;
  private $_approvalDate;

  public function getAllData() : array {
    return [
      "cost" => $this->getCost(),
      "complaint" => $this->getComplaint(),
      "checklist" => $this->getChecklist(),
      "formOfPayment" => $this->getFormOfPayment(),
      "isInstallment" => $this->getIsInstallment(),
      "qtdeInstallment" => $this->getQtdeInstallment(),
      "situation" => $this->getSituation(),
      "status" => $this->getStatus(),
      "priority" => $this->getPriority(),
      "approvalDate" => $this->getApprovalDate()
    ];
  }

  private function getChecklist() : string|null {
    return $this->_checklist;
  }

  private function getApprovalDate() : DateTime|null {
    return $this->_approvalDate;
  }

  private function setChecklist($checklist) : void {
    $this->_checklist = Regex::evaluate($checklist, "/^[\p{Ll}\p{Lu}\p{M}\s\.,]+$/");
  }

  private function setApprovalDate($approvalDate) : void {
    $this->_approvalDate = $approvalDate->format("m-d-Y");
  }

  public function register($cost, $complaint, $checklist, $formOfPayment, $isInstallment, $qtdeInstallment, $situation, $status, $priority, $approvalDate) : void {
    $this->setCost();
    $this->setComplaint();
    $this->setChecklist();
    $this->setFormOfPayment();
    $this->setIsInstallment();
    $this->setQtdeInstallment();
    $this->setSituation();
    $this->setStatus();
    $this->setPriority();
    $this->setApprovalDate();

    Crud::create(get_class($this), $this->getAllData());
  }

  public function __construct() { Crud::getConnection(); }
}
