<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Payable;

class User extends Authenticatable implements Payable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'matric', 'level_id', 'programme_id', 'print_status','payment_status', 'password','type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function transactions() {
        return $this->hasMany('App\Transaction');
    }

    public function getRouteKeyName(){
        return 'matric';
    }


    public function fullname(){
        return $this->fname.' '.$this->lname;
    }

    public function level(){
        return $this->belongsTo('App\Level');
    }

    public function programme(){
        return $this->belongsTo('App\Programme');
    }

    public function paymentStatus(){
        return $this->payment_status;
    }

    public function profileUpdated(){
        if ($this->avatar == NULL) {
            return false;
        }

        return true;
    }

    public function download(){
        $array = [];

        $array['old-name'] = $this->avatar;
        $array['new-name'] = $this->fullName().' '.$this->matric.' '.$this->level->name.' '.$this->programme->name;

        return $array;
    }

    public function getPaidAttribute(){
        return $this->transactions()->where('status', 'success')->value('amount');
    }
}
