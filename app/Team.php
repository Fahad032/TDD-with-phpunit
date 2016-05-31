<?php

namespace MyCompany;

use MyCompany\User;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    
    protected $fillable = [
    						'name', 
    						'size'
    					];
						
						
	public function add($user){

		$this->guardAgainstTooManyMembers($user);
		
		// $user might be a collection or an instance of user class
		
		$method = $user instanceof User ? 'save' : 'saveMany'; 
		
		$this->members()->$method($user);
		
	}	
	
	public function members(){
		
		return $this->hasOne(User::class);
		
	}
	
	public function count(){
			
		return $this->members()->count();
		
	}
	
	protected function guardAgainstTooManyMembers($users){
		
		$newUserToAdd = $users instanceof User ? 1 : count($users);  
		
		$memberCount = $newUserToAdd + $this->count();
				
		if($memberCount > $this->size){
			
			throw new \Exception("Exception", 1);
			
		}
		
	}
	
	
	public function leave($user){
				
		return $this->members()->where('id', $user->id)->update(['team_id' => 'null']);
		
	}
	
	
	public function reset(){
		
		return $this->members()->update(['team_id' => 'null']);
		
	}
					
}
