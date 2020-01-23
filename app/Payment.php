<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'mode','registration_number','status','user_id','amount',
    ];
}
