<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $fillable = [
    	'user_id',
    	'involved_id',
    	'notification_type',
    	'recommendation',
    	'event'
    ];
}
