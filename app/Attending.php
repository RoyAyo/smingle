<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attending extends Model
{
   protected $fillable = ['user_id','event_id','attending']; 
}
