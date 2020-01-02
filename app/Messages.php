<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable = [
    	'sender_id',
    	'receiver_id',
    	'message'
    ];

    public function sender()
    {
        return $this->belongsTo('App\User', 'sender_id')->select(['id', 'name']);
    }

    public function receiver()
    {
        return $this->belongsTo('App\User', 'receiver_id')->select(['id', 'name']);
    }
}
