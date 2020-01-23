<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'line1','line2','line3','city','pincode','user_id','state_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function state(){
        return $this->belongsTo('App\State');
    }
}
