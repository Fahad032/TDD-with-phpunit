<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LikeTest extends TestCase
{
	//use DatabaseTransactions;
	
	
	/** @test */
	
	public function a_user_can_like_a_post(){

	
	// Given we have a post that is possesed to a user
	// Given we have a user
	// Given The user is signed in
	
	$post = factory(MyCompany\Post::class)->create();
	
	$user = factory(MyCompany\User::class)->create();
	
	$this->actingAs($user);
	
	
	// when the user likes a post
	
	$post->like();
	
	// then we should see the evidence in the database 
	// and the post should be liked
	
	$this->seeInDatabase('likeable', [
						
						'user_id' => $user->id,
						'likeable_id' => $post->id,
						'likeable_type' => get_class($post)
						
						]);
	
		
	}
	
	//$this->assertTrue($post->isLiked());	
	
	
}
