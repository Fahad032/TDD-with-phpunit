<?php 

namespace MyCompany;

use MyCompany\Product;

Class Order{
	
	protected $products = array();
	
	
		
	public function add(Product $product){
		
		$this->products[] = $product;
		
	}
	
	
	
	public function productList(){
		
		return $this->products;
		
	}
	
	
	
	public function total(){
		
		$total = 0;
		
		foreach($this->products as $product){
			
			$total += $product->cost();
		}
		
		return $total;
	}
	
}
