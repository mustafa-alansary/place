<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    //
    
    protected $fillable =['pool','football_s','volleyball_s','basketball_S','house','Kitchen','s_section','f_section','lounges','rooms','bedrooms','wc'];



	    public function place(){

	    	return $this->belongsTo(Place::class);
	    }


   
}
