<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    //

    protected $fillable = ['name','user_id'];

    protected $hidden = ['user_id'];

    public function user(){

    	return $this->belongsTo(User::class);
    }
}
