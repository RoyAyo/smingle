<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

	protected $fillable = [
        'user_id', 'gender', 'age','country','state','m_status','r_status','height','religion','student','need','level','course','school','jobs','model','body_shape','skin_colour'
    ];

    public function user(){
    	return $this->belongsTo("App\User");
    }

    public function student(){
    	return $this->hasOne("App\Student");
    }
}