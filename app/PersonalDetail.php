<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
    protected $fillable = [
        'name','father_name','mother_name','dob','alternate_email','education_qualification','phone','user_id','nationality_id','gender_id','marital_status_id','community_id','religion_id','occupation_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function nationality(){
    	return $this->belongsTo('App\Nationality');
    }

    public function gender(){
    	return $this->belongsTo('App\Gender');
    }

    public function marital_status(){
    	return $this->belongsTo('App\MaritalStatus');
    }

    public function community(){
    	return $this->belongsTo('App\Community');
    }

    public function religion(){
    	return $this->belongsTo('App\Religion');
    }

    public function occupation(){
        return $this->belongsTo('App\Occupation');
    }
}
