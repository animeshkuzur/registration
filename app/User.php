<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function personal_details(){
        return $this->hasOne('App\PersonalDetail');
    }

    public function registration(){
        return $this->hasOne('App\Registration');
    }

    public function exam_centres(){
        return $this->hasMany('App\UserExamCentre');
    }

    public function address(){
        return $this->hasOne('App\Address');
    }

    public function documents(){
        return $this->hasMany('App\Document');
    }

    public function payment(){
        return $this->hasOne('App\Payment');
    }
}
