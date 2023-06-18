<?php

require_once (dirname(__FILE__)."/../lib/Crud.php");
require_once (dirname(__FILE__)."/../lib/Regex.php");

class User {
  private bool $_status = false;
  private string $_name = "";
  private string $_identifier = "";
  private string $_password = "";
  private array $required;
  private array $_error = [
    "name" => "",
    "identifier" => "",
    "password" => "",
    "confirmPassword" => ""
  ];
  
  public function wipeAllData() : void {
    foreach($this as $property => $_) {
      $this->$property = null;
    }
  }

  public function getAllData() : array {
    return [
      "name" => $this->getName(),
      "identifier" => $this->getIdentifier(),
      "password" => $this->getPassword()
    ];
  }

  public function getStatus() : bool|null {
    return $this->_status;
  }

  private function getRequired() : array|null {
    return $this->_required;
  }

  private function getName() : string|null {
    return $this->_name;
  }

  private function getIdentifier() : string|null {
    return $this->_identifier;
  }

  private function getPassword() : string|null {
    return $this->_password;
  }

  private function setRequired(array $required) {
    $this->_required = $required;
  }

  private function setName(string $name) : void {
    $result = Regex::evaluate($name, "/^[\p{Lu}\p{Ll}\p{M}\s]+$/u");
    if ($result === -1) {
      $this->_error["name"] = "somente letras do alfabeto!";
      return;
    }

    $this->_name = $result;
  }

  private function setIdentifier(string $identifier) : void {
    $result = $this->isCellphone($identifier);
    if ($result) {
      $this->_identifier = $result["prefix"] . $result["sufix"];
    } else {
      $result = filter_var($identifier, FILTER_SANITIZE_EMAIL);
      $result = filter_var($identifier, FILTER_VALIDATE_EMAIL);

      if ($result === false) {
        $this->_error["identifier"] = "insira um email ou celular válido!";
        return;
      }

      $this->_identifier = $result;
    }
  }

  private function setPassword(string $password) : void {
    $this->_password = $password;
  }

  private function isCellphone($identifier) {
    $identifier = preg_replace("/\D/", "", $identifier);
    preg_match("/^(?<countryCode>\d{2})?(?<areaCode>\d{2})?(?<prefix>\d{5})(?<sufix>\d{4})$/", $identifier, $output);
    return $output;
  }

  private function comparePasswords($password, $confirmPassword) {
    if ($password !== $confirmPassword) {
      $this->_error["password"] = "senhas não correspondem!";
      $this->_error["confirmPassword"] = "senhas não correspondem!";
      return;
    }

    $this->setPassword($password);
  }

  private function checkIfIdentifierAlreadyExists() {
    $registered = Crud::read(get_class($this), ["identifier"], 
      [
        "comparisons" => [
          ["field" => "identifier", "operator" => "=", "value" => $this->getIdentifier()]
        ],
        "logicalOperators" => []
      ]
    );

    if ($registered) {
      $this->_error["identifier"] = "{$this->getIdentifier()} já cadastrado! Insira outro!";
      return;
    }

    $this->save();
  }

  private function IsMissingRequired() {
    foreach($this->getAllData() as $attribute => $value) {
      if (in_array($attribute, $this->getRequired()) && empty($value)) {
        return true;
      }
    }
    return false;
  }

  private function save() {
    $this->_status = Crud::create(get_class($this), $this->getAllData());  
  }

  public function register($required, $name, $identifier, $password, $confirmPassword) {
    $this->setRequired($required);
    $this->setName($name);
    $this->setIdentifier($identifier);
    $this->comparePasswords($password, $confirmPassword);

    if (!$this->IsMissingRequired()) {
      $this->checkIfIdentifierAlreadyExists();
    }
  
    return $this->_error;
  }

  public function __construct() { Crud::getConnection(); }
}