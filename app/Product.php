<?php

namespace MyCompany;

/**
 * 
 */
class Product{
		
	protected $name, $cost;
		
	public function __construct($name, $cost){
		
		$this->name = $name;
		
		$this->cost = $cost;
		
	}
	
	
	public function name() {
		
		return $this->name;
		
	}
	
	public function cost(){
		
		return $this->cost;
		
	}
	
}
