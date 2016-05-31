<?php 

use MyCompany\Product;

Class productTest extends PHPUnit_Framework_TestCase{
	
	protected $product;
	
	public function setUp(){
		
		$this->product = new Product('Pencil', 10);

	}
	
	
	/** @test */
	
	public function a_product_has_name(){		
		
		$this->assertEquals('Pencil', $this->product->name());

	}
	
	
	/** @test */
	
	public function a_product_has_price(){
				
		$this->assertEquals(10, $this->product->cost());

	}
	
	
}
