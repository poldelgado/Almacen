<?php

use Faker\Generator as Faker;
use App\State;

$factory->define(App\Province::class, function (Faker $faker) {

    $country = State::all()->random();
    return [
        'name' => $faker->streetName,
        'state_id' => $country->id,
    ];
});
