<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnonMessage extends Model
{
    protected $fillable = [
    	'user_id','message'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
