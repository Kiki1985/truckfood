<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Truck;
use Faker\Generator as Faker;

$factory->define(Truck::class, function (Faker $faker) {
    $states = new \App\State();
    $states = $states->statesList();

    $randomState = \App\State::all()->random()->state;

	$state = \App\State::where('state', $randomState)->get();

	$state_id = $state[0]->id;

    return [
        'user_id' => \App\User::all()->random()->id,
        'state_id' => $state_id,
        'lat' => $states[$randomState][0],
        'lng' => $states[$randomState][1],
        'city' => $faker->city,
        'name' => $faker->company(),
        'description' => $faker->text(80),
    ];
});
