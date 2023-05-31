<?php

class Customer extends Person {
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
            "nationality" => $this->getNationality(),
            "birthdate" => $this->getBirthdate(),
            "rg" => $this->getRg(),
            "cpf" => $this->getCpf(),
        ];
    }

    private function setCpf($CPF) : void {
		$this->_CPF = Regex::validate($CPF, "/^([0-9]{11})?$/");
	}

    public function register($name, $telephone, $cellphone, $email, $address, $CEP, $houseNumber, $city, $neighborhood, $reference, $gender, $nationality, $birthdate, $RG, $CPF) : void {
        $this->setName($name);
        $this->setTelephone($telephone);
        $this->setCellphone($cellphone);
        $this->setEmail($email);
        $this->setAddress($address);
        $this->setCep($cep);
        $this->setHouseNumber($houseNumber);
        $this->setCity($city);
        $this->setNeighborhood($neighborhood);
        $this->setReference($reference);
        $this->setGender($gender);
        $this->setNationality($nationality);
        $this->setBirthdate($birthdate);
        $this->setRg($RG);
        $this->setCpf($CPF);
        
        Crud::create(get_class($this), $this->getAllData());
    }

    public function __construct() { Crud::getConnection(); }
}