<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   /* protected $fillable = [
        'fname', 'lname', 'matric', 'password',
    ];*/

    public function user(){
    	return $this->hasMany('App\User');
    }

    public function fee(){
        return $this->hasOne('App\Fee');
    }
}
