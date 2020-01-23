<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserExamCentre extends Model
{
    protected $fillable = [
        'user_id','exam_centre_id','preference',
    ];

    
}
