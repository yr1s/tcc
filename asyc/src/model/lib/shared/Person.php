<?php

require_once (dirname(__FILE__)."/Contact.php");

abstract class Person extends Contact {
  protected $_gender;
	protected $_nationality;
	protected $_birthdate;
	protected $_RG;
	protected $_CPF;
	
  abstract protected function setCpf();

	protected function getGender() {
		return $this->_gender;
	}

	protected function getNationality() {
		return $this->_nacionality;
	}

	protected function getBirthdate() {
		return $this->_birthdate;
	}

	protected function getRg() {
		return $this->_RG;
	}

	protected function getCpf() {
		return $this->_CPF;
	}

  protected function setGender($gender) : void {
		$this->_gender = Regex::validate($gender, "/^([m|f]?|[M|F]?)+$/");
	}

	protected function setNationality($nationality) : void {
		$this->_nationality = Regex::validate($nationality, "/^[\p{Ll}\p{Lu}\p{M}\s]+$/");
	}

	protected function setBirthdate($birthdate) : void {
		$this->_birthdate = $birthdate->format("m/d/Y");
	}

	protected function setRg($RG) : void {
		$this->_RG = Regex::validate($RG, "/^([0-9]{5,14})?$/");
	}
}
