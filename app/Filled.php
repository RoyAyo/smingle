<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filled extends Model
{
    protected $fillable = [
        'user_id', 'general'
    ];
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
