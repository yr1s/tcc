<?php

require_once (dirname(__FILE__)."/Contact.php");

abstract class Person extends Contact {
  protected $_gender;
	protected $_nationality;
	protected $_birthdate;
	protected $_RG;
	protected $_CPF;
	
  abstract protected function setCpf();

	protected function getGender() : string|null {
		return $this->_gender;
	}

	protected function getNationality() : string|null {
		return $this->_nacionality;
	}

	protected function getBirthdate() : DateTime|null {
		return $this->_birthdate;
	}

	protected function getRg() : string|null {
		return $this->_RG;
	}

	protected function getCpf() : string|null {
		return $this->_CPF;
	}

  protected function setGender($gender) : void {
		$this->_gender = Regex::evaluate($gender, "/^([m|f]?|[M|F]?)+$/");
	}

	protected function setNationality($nationality) : void {
		$this->_nationality = Regex::evaluate($nationality, "/^[\p{Ll}\p{Lu}\p{M}\s]+$/");
	}

	protected function setBirthdate($birthdate) : void {
		$this->_birthdate = $birthdate->format("m/d/Y");
	}

	protected function setRg($RG) : void {
		$this->_RG = Regex::evaluate($RG, "/^([0-9]{5,14})?$/");
	}
}
