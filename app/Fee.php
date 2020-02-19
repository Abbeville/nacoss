<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    public function levels(){
    	return $this->belongsToMany('App\Levels');
    }
}
