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

	protected function getName() : string|null {
		return $this->_name;
	}

	protected function getTelephone() : string|null {
		return $this->_telephone;
	}

	protected function getCellphone() : string|null {
		return $this->_cellphone;
	}

	protected function getEmail() : string|null {
		return $this->_email;
	}

	protected function getAddress() : string|null {
		return $this->_address;
	}

	protected function getCep() : string|null {
		return $this->_CEP;
	}

	protected function getHouseNumber() : string|null {
		return $this->_houseNumber;
	}

	protected function getCity() : string|null {
		return $this->_city;
	}

	protected function getNeighborhood() : string|null {
		return $this->_neighborhood;
	}

	protected function getReference() : string|null {
		return $this->_reference;
	}

  protected function setName($name) : void {
    $this->_name = Regex::evaluate($name, "/^[\p{Ll}\p{Lu}\p{M}\s]+$/");	
	}	

	protected function setTelephone($telephone) : void {
		$this->_telephone = Regex::evaluate($telephone, "/^([0-9]{8})?$/");
	}

	protected function setCellphone($cellphone) : void {
		$this->_cellphone = Regex::evaluate($cellphone, "/^([9]{1}[0-9]{8})?$/"); 
	}

	protected function setEmail($email) : void {
		$this->_email = Regex::evaluate($email, "/^[a-z0-9\s_.$!#%?=&*'\"{|}\/+-]+@[a-z0-9-]+\.[a-z0-9-.]+$/"); 
	} 

	protected function setAddress($address) : void {
		$this->_address = Regex::evaluate($endereco, "/^[\p{Ll}\p{Lu}\p{M}\s]+$/");
	}

	protected function setCep($CEP) : void {
		$this->_CEP = Regex::evaluate($CEP, "/^([0-9]{8})?$/");
	}

	protected function setHouseNumber($houseNumber) : void {
		$this->_houseNumber = Regex::evaluate($houseNumber, "/^([0-9]{1,5}[a-z]?)?$/");
	} 

	protected function setCity($city) : void {
		$this->_city = Regex::evaluate($city, "/^([\p{Ll}\p{Lu}\p{M}\s]+)?$/");
	}

	protected function setNeighborhood($neighborhood) : void {
		$this->_neighborhood = Regex::evaluate($neighborhood, "/^([\p{Ll}\p{Lu}\p{M}\s]+)?$/");
	}

	protected function setReference($reference) : void {
		$this->_reference = Regex::evaluate($reference, "/^([\p{Ll}\p{Lu}\p{M}.,\s]+)?$/");
	} 
}
