<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LikeTest extends TestCase
{
	use DatabaseTransactions;
	
	
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
		
		$this->assertTrue($post->isLiked());	
		
	}
	
	
	
	/** @test **/
	
	public function a_user_can_unlike_a_post(){
		
		//given
			
		$post = factory(MyCompany\Post::class)->create();
		
		$user = factory(MyCompany\User::class)->create();
		
		$this->actingAs($user);
		
		
		// To unlike a post user must have to like it first
		// now the user can unlike it ( when )
		
		$post->like();
		$post->unlike();
		
		
		//then
		
		$this->notSeeInDatabase('likeable', [
				
				'user_id'		=> $user->id,
				
				'likeable_id'	=> $post->id,
				
				'likeable_type'	=> get_class($post)
		]);
		
		$this->assertFalse($post->isLiked());
		
		
		
	}
	
	
	/** @test */
	
	public function a_user_can_toggle_a_post_like_status(){
		
		//given
			
		$post = factory(MyCompany\Post::class)->create();
		
		$user = factory(MyCompany\User::class)->create();
		
		$this->actingAs($user);
		
		
		// when user has already liked a post, toggle will unlike it
		
		//$post->like();
		
		$post->toogleLike();
		
		
		//then
		
		//$this->notSeeInDatabase('likeable', [

		$this->seeInDatabase('likeable', [
						
				'user_id'		=> $user->id,
				
				'likeable_id'	=> $post->id,
				
				'likeable_type'	=> get_class($post)
		]);
		
		//$this->assertFalse($post->isLiked());

		$this->assertTrue($post->isLiked());
		
		
	}
	
	
	/** @test */
	
	public function a_post_knows_how_many_like_it_has(){
		
		//given
			
		$post = factory(MyCompany\Post::class)->create();
		
		$user = factory(MyCompany\User::class)->create();
		
		$this->actingAs($user);
		
		//when
				
		$post->toogleLike();		
		
		//then
		
		$this->assertEquals(1, $post->likesCount);
		
	}
	
	
	
}
