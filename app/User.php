<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username', 'email', 'password','gender','DOB','zodiac','instagram','twitter'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile(){
        return $this->hasOne('App\Profile');
    }
    public function required(){
        return $this->hasOne('App\Required');
    }

    public function matches(){
        return $this->hasMany('App\Matches');
    }
    public function general(){
        return $this->hasOne('App\General');
    }

    public function rmessages()
    {
        return $this->hasMany('App\Messages', 'receiver_id');
    }
    public function smessages()
    {
        return $this->hasMany('App\Messages', 'sender_id');
    }

    public function anonmessage(){
        return $this->hasMany('App\Messages');
    }

    public function handle(){
        return $this->hasOne('App\handles');
    }
}
