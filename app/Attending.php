<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attending extends Model
{
   $fillable = ['user_id','event_id','attending']; 
}
