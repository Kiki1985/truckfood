<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\State;

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

    public function updateCoordinates($stateId)
    {
        $states = new State();
        $state = $states->find($stateId)->state;
        $states = $states->statesList();

        $lat = $states[$state][0];
        $lng = $states[$state][1];

        $truck = Truck::update([
            'lat' => $lat,
            'lng' =>$lng
        ]);
    }

    public function updateTruck($truck)
    {
        Truck::update($truck);
        Truck::update([
            'slug' => str_replace(' ', '', $truck['name'])
        ]);
        Truck::updateCoordinates($truck['state_id']);
    }

    public static function loadlocations()
    {
        $trucks = Truck::all();
        $icon = [];
        foreach ($trucks as $truck) {
            
            if($truck->user_id == auth()->user()->id || auth()->user()->role == "Admin") {
                $icon[] = 'blue';
            }else{
                $icon[] = 'red';
            }
        }
        return [$trucks, $icon];
    }
}
