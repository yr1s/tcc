<?php

require_once (dirname(__FILE__)."/../lib/Crud.php");
require_once (dirname(__FILE__)."/../lib/Regex.php");
require_once (dirname(__FILE__)."/../lib/shared/Person.php");

class Employee extends Person {
	private $_civilStatus;
	private $_position;
	private $_commission;

	public function getAllData() : array {	
		return [
			"name" => $this->getName(),
			"telephone" => $this->getTelephone(),
			"cellphone" => $this->getCellphone(),
			"email" => $this->getEmail(),
			"address" => $this->getAddress(),
			"cep" => $this->getCep(),
			"houseNumber" => $this->getHouseNumber(),
			"city" => $this->getCity(),
			"neighborhood" => $this->getNeighborhood(),
			"reference" => $this->getReference(),
			"gender" => $this->getGender(),
			"civilStatus" => $this->getCivilStatus(),
			"nationality" => $this->getNationality(),
			"birthdate" => $this->getBirthdate(),
			"rg" => $this->getRg(),
			"cpf" => $this->getCpf(),
			"position" => $this->getPosition(),
			"commission" => $this->getCommission()
		];
	}

	private function getCivilStatus() : string|null {
		return $this->_civilStatus;
	}

	private function getPosition() : string|null {
		return $this->_position;
	}

	private function getCommission() : float|null {
		return $this->_commission;
	}

	private function setCivilStatus($civilStatus) : void {
		$this->_civilStatus = Regex::evaluate($civilStatus, "/^[\p{Ll}\p{Lu}\p{M}\s]?$/"); 
	}

	private function setPosition($position) : void {
		$this->_position = Regex::evaluate($position, "/^[\p{Ll}\p{Lu}\p{M}\s]+$/");
	}

	private function setCommission($commission) : void {
		$this->_commission = (double) Regex::evaluate($commission, "/^[+-]?([0-9]*[.])?[0-9]+$/");
	}

  private function setCpf($CPF) : void {
		$this->_CPF = Regex::evaluate($CPF, "/^[0-9]{11}$/");
	}

	public function register($name, $telephone, $cellphone, $email, $address, $CEP, $houseNumber, $city, $neighborhood, $reference, 
		$gender, $civilStatus, $nationality, $birthdate, $RG, $CPF, $CNPJ, $position, $commission) : void {

		$this->setName($name);
		$this->setTelephone($telephone);
		$this->setCellphone($cellphone);
		$this->setEmail($email);
		$this->setAddress($address);
		$this->setCep($CEP);
		$this->setHouseNumber($houseNumber);
		$this->setCity($city);
		$this->setNeighborhood($neighborhood);
		$this->setReference($reference);
		$this->setGender($gender);
		$this->setCivilStatus($civilStatus);
		$this->setNationality($nationality);
		$this->setBirthdate($birthdate);
		$this->setRg($RG);
		$this->setCpf($CPF);
		$this->setCnpj($CNPJ);
		$this->setPosition($position);
		$this->setCommission($commission);

    Crud::create(get_class($this), $this->getAllData());
	}

	public function __construct() { Crud::getConnection(); }
}
