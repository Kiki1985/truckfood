<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
	protected $guarded = [];
	
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
