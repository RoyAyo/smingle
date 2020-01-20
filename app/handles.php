<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class handles extends Model
{
    protected $fillables = [
    	'user_id','twitter','instagram'
    ]; 

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
