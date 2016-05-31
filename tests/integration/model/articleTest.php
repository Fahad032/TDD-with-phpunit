<?php
use MyCompany\Article;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class articleTest extends TestCase{
	
	use DatabaseTransactions;
	
	/** @test */
	
	public function popular_article(){
		
		$articles = new MyCompany\Article();
		
		factory('MyCompany\Article', 5)->create();		
		
		$this->assertEquals(4, count($articles->Trending()));	
		
	}

	
}
