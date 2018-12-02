<?php

use Faker\Generator as Faker;
use App\Province;

$factory->define(App\Location::class, function (Faker $faker) {

    $province = Province::all()->random();
    return [
        'name' => $faker->city,
        'province_id' => $province->id,
    ];
});
