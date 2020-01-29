<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Top extends Model
{
    protected $fillable = [
    	'user_id','best_id','score'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
