<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'user_id','document_type_id','path',
    ];

    public function document_type(){
    	return $this->belongsTo('App\DocumentType');
    }
}
