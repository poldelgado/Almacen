<?php

use Faker\Generator as Faker;
use App\Liquidacion;
use App\User;

$factory->define(Liquidacion::class, function (Faker $faker) {

        $sN = $faker->randomFloat(2,15000, 25000);
        $usuario = User::all()->random();
    return [
        'sueldoNeto' => $sN,
        'sueldoBruto' => $sN*1.25,
        'periodo' => $faker->monthName.' - '.$faker->year('now'),
        'desde' => $faker->date('Y-m-d'),
        'hasta' => $faker->date('Y-m-d'),
        'estado' => $faker->randomElement(['liquidado','pendiente']),
        'user_id' => $usuario->id,

    ];
});
