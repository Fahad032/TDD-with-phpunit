<?php

namespace MyCompany;

use Auth;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    
    public function like(){
    	
		$like = new Like(['user_id' => Auth::id()]);
		
		$this->likes()->save($like);
		
    }
	
	
	public function likes(){
		
		return $this->morphMany(Like::class, 'likeable');
		
	}
}
