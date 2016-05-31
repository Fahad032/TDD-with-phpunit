<?php

use MyCompany\Person;



class PersonTest extends PHPUnit_Framework_TestCase{
		
	protected $person;	
	
	public function setUp(){
		
		$this->person = new Person('Fahad', 'Developer');

	}
	
	/**
	 * @test
	 */
	
	public function a_person_must_have_a_name(){

		$this->assertEquals('Fahad', $this->person->getName());
		
	}
	
	/**
	 * @test
	 */
	
	public function a_person_has_a_profession(){

		$this->assertEquals('Developer', $this->person->getProfession());	
		
	}
	
}
