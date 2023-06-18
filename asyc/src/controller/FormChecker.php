<?php

require_once (dirname(__FILE__) . "/ModelController.php");

class FormChecker {
  private static $_instance = null;
  private array $_sanitizedSubmittedInformation = [];
  private array $_submittedInformation = [];
  private array $_required = [];
  private array $_errorMessage = [];
  private array $_fieldsLength = [];
  private string $_defaultErrorMessage = "";
  private string $_model = "";

  public function checkRequired() : bool {
    foreach($this->_submittedInformation as $attribute => $data) {
      if (in_array($attribute, $this->_required) && empty($data)) {
        $this->_errorMessage[$attribute] = $this->_defaultErrorMessage;
      }
    }

    return in_array($this->_defaultErrorMessage, array_values($this->_errorMessage));
  }
  
  public function sanitize() : void {
    $this->_sanitizedSubmittedInformation = array_map(
      fn($data) => htmlspecialchars($data, ENT_QUOTES, "UTF-8"),
      $this->_submittedInformation
    );
  }

  public function checkLength() {
    foreach($this->_sanitizedSubmittedInformation as $attribute => $data) {
      if (mb_strlen($data) > $this->_fieldsLength[$attribute]) {
        $this->_errorMessage[$attribute] = "deve ser menor que {$this->_fieldsLength[$attribute]} caracteres!";
      }
    }
  }
  
  public function validate() {
    // checking firstly if there's no error related to user input from the last verification (checkLength)
    foreach($this->_errorMessage as $attribute => $message) {
      if (!empty($message)) { return; }
    }

    $model = ModelController::getModel($this->_model);    
    $this->_errorMessage = $model->register($this->_required, ...$this->_sanitizedSubmittedInformation);

    if ($model->getStatus()) {
      // start session for user
    }
  }

  public function getErrorMessage(string $attribute) : string { return $this->_errorMessage[$attribute]; }

  private function setSubmittedInformation(array $submittedInformation) : void { $this->_submittedInformation = $submittedInformation; }
  private function setRequired(array $required) : void { $this->_required = $required; }
  private function setErrorMessage(array $errorMessage) : void { $this->_errorMessage = $errorMessage; }
  private function setFieldsLength(array $fieldsLength) : void { $this->_fieldsLength = $fieldsLength; }
  private function setDefaultErrorMessage(string $defaultErrorMessage) : void { $this->_defaultErrorMessage = $defaultErrorMessage; }
  private function setModel(string $model) : void { $this->_model = $model; }

  public function setAll(array $submittedInformation, array $required, array $errorMessage, array $fieldsLength, string $defaultErrorMessage, string $model) : void {
    $this->setSubmittedInformation($submittedInformation);
    $this->setRequired($required);
    $this->setErrorMessage($errorMessage);
    $this->setFieldsLength($fieldsLength);
    $this->setDefaultErrorMessage($defaultErrorMessage);
    $this->setModel($model);
  }

  public static function getInstance() : FormChecker {
    if (!isset(self::$_instance)) { self::$_instance = new FormChecker(); }

    return self::$_instance;
  }
}