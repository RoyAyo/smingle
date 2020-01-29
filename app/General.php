<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{

	protected $fillable = [
        'user_id', 'gen1','gen2','gen3','gen4','gen5','gen6','gen7','gen8','gen9','gen10','gen11','gen12','gen13','gen14','gen15'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
