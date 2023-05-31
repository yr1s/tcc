<?php

class Stock {
    private $_description;
    private $_category;
    private $_qtdeProductsStored;
    private $_location;

    public function getAllData() : array {
        return [
            "description" => $this->getDescription(),
            "category" => $this->getCategory(),
            "qtdeProductsStored" => $this->getQtdeProductsStored(),
            "location" => $this->getLocation()
        ];
    }

    public function wipeAllData() : void {
        foreach($this as $property => $_) {
            $this->$property = null;
        }
    }

    private function getDescription() : string {
        return $this->_description;
    }

    private function getCategory() : string {
        return $this->_category;
    }

    private function getQtdeProductsStored() : int {
        return $this->_qtdeProductsStored;
    } 

    private function getLocation() : string {
        return $this->_location;
    }

    private function setDescription($description) : void {
        $this->_description = Regex::validate($description, "/^[\p{Ll}\p{Lu}\p{M}\s]+$/");
    }

    private function setCategory($category) : void {
        $this->_category = Regex::validate($category, "/^[\p{Ll}\p{Lu}\p{M}\s]+$/");
    }

    private function setQtdeProductsStored($qtdeProductsStored) : void {
        $this->_qtdeProductsStored = Regex::validate($qtdeProductsStored, "/^[0-9]+$/");
    }

    private function setLocation($location) : void {
        $this->_location = Regex::validate($location, "/^[\p{Ll}\p{Lu}\p{M}\s]*$/");
    }

	public function register($description, $category, $qtdeProductsStored, $location) : void {
		$this->setDescription($description);
        $this->setCategory($category);
        $this->setQtdeProductsStored($qtdeProductsStored);
        $this->setLocation($location);

        Crud::create(get_class($this), $this->getAllData());
	}

    public function __construct() { Crud::getConnection(); }
}