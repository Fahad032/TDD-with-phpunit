<?php

namespace MyCompany;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    
    protected $fillable = [
    					 	'title'
    					];
						
	public function scopeTrending($query, $take = 4){
		
		return $query->orderBy('reads', 'desc')->take($take)->get();
	}					
}
