<?php

abstract class Contact {
  protected $_name;
	protected $_telephone;
	protected $_cellphone;
	protected $_email;
	protected $_address;
	protected $_CEP;
	protected $_houseNumber;
	protected $_city;
	protected $_neighborhood;
	protected $_reference;

  public function wipeAllData() : void {
    foreach($this as $property => $_) {
      $this->$property = null;
    }
  }

	protected function getName() {
		return $this->_name;
	}

	protected function getTelephone() {
		return $this->_telephone;
	}

	protected function getCellphone() {
		return $this->_cellphone;
	}

	protected function getEmail() {
		return $this->_email;
	}

	protected function getAddress() {
		return $this->_address;
	}

	protected function getCep() {
		return $this->_CEP;
	}

	protected function getHouseNumber() {
		return $this->_houseNumber;
	}

	protected function getCity() {
		return $this->_city;
	}

	protected function getNeighborhood() {
		return $this->_neighborhood;
	}

	protected function getReference() {
		return $this->_reference;
	}

  protected function setName($name) : void {
    $this->_name = Regex::validate($name, "/^[\p{Ll}\p{Lu}\p{M}\s]+$/");	
	}	

	protected function setTelephone($telephone) : void {
		$this->_telephone = Regex::validate($telephone, "/^([0-9]{8})?$/");
	}

	protected function setCellphone($cellphone) : void {
		$this->_cellphone = Regex::validate($cellphone, "/^([9]{1}[0-9]{8})?$/"); 
	}

	protected function setEmail($email) : void {
		$this->_email = Regex::validate($email, "/^[a-z0-9\s_.$!#%?=&*'\"{|}\/+-]+@[a-z0-9-]+\.[a-z0-9-.]+$/"); 
	} 

	protected function setAddress($address) : void {
		$this->_address = Regex::validate($endereco, "/^[\p{Ll}\p{Lu}\p{M}\s]+$/");
	}

	protected function setCep($CEP) : void {
		$this->_CEP = Regex::validate($CEP, "/^([0-9]{8})?$/");
	}

	protected function setHouseNumber($houseNumber) : void {
		$this->_houseNumber = Regex::validate($houseNumber, "/^([0-9]{1,5}[a-z]?)?$/");
	} 

	protected function setCity($city) : void {
		$this->_city = Regex::validate($city, "/^([\p{Ll}\p{Lu}\p{M}\s]+)?$/");
	}

	protected function setNeighborhood($neighborhood) : void {
		$this->_neighborhood = Regex::validate($neighborhood, "/^([\p{Ll}\p{Lu}\p{M}\s]+)?$/");
	}

	protected function setReference($reference) : void {
		$this->_reference = Regex::validate($reference, "/^([\p{Ll}\p{Lu}\p{M}.,\s]+)?$/");
	} 
}
