<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
    	'event_name','host_name','venue','event_date','users_going','about','verified','public','host_contact'
    ];
}
