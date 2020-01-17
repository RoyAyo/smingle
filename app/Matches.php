<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    
    public function user(){
    	$this->belongsTo('App\User');
    }
}