<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   /* protected $fillable = [
        'fname', 'lname', 'matric', 'password',
    ];*/
    protected $table = 'Programmes';

    public function user(){
    	return $this->hasMany('App\User');
    }
}
