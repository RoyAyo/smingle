<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnonReply extends Model
{
    protected $fillable = [
    	'receiver_id','anon_message_id','reply'
    ];

    public function anonmessage(){
    	return $this->belongsTo('App\AnonMessage');
    }
}
