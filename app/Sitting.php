<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sitting extends Model
{
    //

      protected $fillable = ['in_no','in_no_of_seats','out_no','out_no_of_seats'];

     
	    public function place(){

	    	return $this->belongsTo(Place::class);
	    }

}
