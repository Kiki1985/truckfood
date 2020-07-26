<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
	protected $guarded = [];
    public function trucks()
    {
        return $this->hasMany(Truck::class);
    }
}
