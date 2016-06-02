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
	
	
	public function unlike(){
		
		$this->likes()->where(['likeable_id'=> $this->id, 'user_id' => Auth::id()])->delete();
		
	}
	
	
	public function likes(){
		
		return $this->morphMany(Like::class, 'likeable');
		
	}
	
	public function isLiked(){
		
		return !!$this->likes()->count();
		
	}
}
