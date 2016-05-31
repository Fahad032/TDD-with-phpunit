<?php

namespace MyCompany;

class Person{
	
	protected $name, $profession;
	
	public function __construct($name, $profession){
		
		$this->setName($name);
		
		$this->setProfession($profession);
		
	}
	
	
	public function setName($name){
		
		$this->name = $name;
	}
	
	
	
	public function getName(){
		
		return $this->name;
	}
	
	
	
	public function setProfession($profession){
		
		$this->profession = $profession;
	}
	
	public function getProfession(){
		
		return $this->profession;
	}
	
	
}	
	

