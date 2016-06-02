<?php

namespace MyCompany;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    
    protected $fillable = [
    						'user_id'
    						];
							
	protected $table = 'likeable';						
}
