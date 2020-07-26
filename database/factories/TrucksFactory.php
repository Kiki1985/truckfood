<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Truck;
use Faker\Generator as Faker;

$factory->define(Truck::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::all()->random()->id,
        'name' => $faker->company(),
        'description' => $faker->text(80),
    ];
});
