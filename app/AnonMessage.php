<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnonMessage extends Model
{
    protected $fillable = [
    	'user_id','message','sender_id'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
