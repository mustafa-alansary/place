<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    //

   protected $fillable=['name','location','price','rent_time','size','user_id'];


   protected $hidden = ['user_id'];

    public function user(){

    	return $this->belongsTo(User::class);
    }

    public function sitting(){

    	return $this->hasOne(Sitting::class);
    }

    public function description(){

    	return $this->hasOne(Description::class);
    }



 
}
