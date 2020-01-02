<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Required extends Model
{
    protected $fillable = [
        'user_id', 'gender', 'age','location','m_status','r_status','height','religion','student','need','school', 'course','level'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
