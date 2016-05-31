<?php

use MyCompany\Team;
use MyCompany\User;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TeamTest extends TestCase
{
	use DatabaseTransactions;
	
	/** @test */
	
	public function a_team_has_a_name(){
		
		$team = new Team(['name' => 'Phpfox', 'size' => 5]);
		
		$this->assertEquals('Phpfox', $team->name);
	}
	
	
	/** @test */
	
	public function a_team_can_add_members(){
		
		//$team = new Team(['name' => 'Phpfox', 'size' => 2]);
		
		$team = factory(MyCompany\Team::class)->create(['size' => 2]);

		factory(MyCompany\User::class, 2)->create();		
		
		$user = factory(MyCompany\User::class)->create();

		$userTwo = factory(MyCompany\User::class)->create();
				
		$team->add($user);

		$team->add($userTwo);
		
		$this->assertEquals(2, $team->count());

		
	}
	
	/** @test */
	
	public function a_team_can_add_multiple_members_at_once(){

		$team = factory(MyCompany\Team::class)->create(['size' => 2]);

		$users = factory(MyCompany\User::class, 2)->create();	
		
		$team->add($users);
		
		$this->assertEquals(2, $team->count());
		
	}
	
	
	/** @test */
	
	public function a_team_has_a_maximum_size(){
		
		$team = factory(MyCompany\Team::class)->create(['size' => 2]);

		$userOne = factory(MyCompany\User::class)->create();	

		$userTwo = factory(MyCompany\User::class)->create();	
		
		$team->add($userOne);

		$team->add($userTwo);
		
		$this->setExpectedException('Exception');
		
		$userThree = factory(MyCompany\User::class)->create();
		
		$team->add($userThree);		
		
		
	}
	
	
	/** @test */
	
	public function should_not_exceed_max_team_size_even_when_adding_multiple_users(){
		

		$team = factory(MyCompany\Team::class)->create(['size' => 2]);

		$users = factory(MyCompany\User::class, 3)->create();	
		
		$this->setExpectedException('Exception');
		
		$team->add($users);		
		
	}
	
	
	/** @test */
	
	public function a_team_can_remove_a_member(){		

		$team = factory(MyCompany\Team::class)->create(['size' => 2]);

		$users = factory(MyCompany\User::class, 2)->create();	
		
		$team->add($users);
		
		$team->leave($users->first());		
		
		$this->assertEquals(1, $team->count());
		
	}
	
	
	/** @test **/
	
	public function a_team_can_remove_all_members_at_once(){
		
		$team = factory(MyCompany\Team::class)->create(['size' => 2]);

		$users = factory(MyCompany\User::class, 2)->create();	
		
		$team->add($users);
		
		$team->reset();
		
		$this->assertEquals(0, $team->count());
		
	}
	
	
}
