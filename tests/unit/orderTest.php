<?php 

use MyCompany\Product;
use MyCompany\Order;

class orderTest extends PHPUnit_Framework_TestCase{
	
	/** @test */
	
	public function an_order_consists_of_product(){
		
		$product = new Product('Pencil', 10);

		$product2 = new Product('Pen', 10);
		
		$order= new Order();

		$order->add($product);

		$order->add($product2);

		//$this->assertEquals(2, count($order->orderList()));		

		$this->assertCount(2, $order->productList());
	}
	
	
	/** @test */
	
	public function an_order_can_determine_total_cost_of_its_products(){
			
		
		$product = new Product('Pencil', 10);

		$product2 = new Product('Pen', 10);
		
		$order= new Order();

		$order->add($product);

		$order->add($product2);

		$this->assertEquals(20, $order->total());			
			
	}
	
}
