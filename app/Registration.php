<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'user_id','registration_number',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
