<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'apellido' => $faker->lastname,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
        'turno' => $faker->randomElement(['manana','tarde']),
        'telefono' => 381,
        'dni' => $faker->randomNumber(8),
        'fechaAlta' => $faker->date('Y-m-d'),
        'type' => $faker->randomElement(['member','admin']),
        'domicilio_id' => $faker->randomNumber(1),
    ];
    App\User::create(
        [
            'name' => 'Pablo',
            'apellido' => 'Delgado',
            'email' => 'poldelgado@gmail.com',
            'turno' => 'maniana',
            'password' => bcrypt('mamadera'),
            'telefono' => '3814',
            'dni' => '3246',
            'type' => 'admin',
            'fechaAlta' => '1986-11-26',
            'domicilio_id' => '1'
        ]
    );
    App\User::create(
        [
            'name' => 'César',
            'apellido' => 'Galup',
            'email' => 'cesargalup@gmail.com',
            'turno' => 'maniana',
            'password' => bcrypt('mamadera'),
            'telefono' => '3814',
            'dni' => '3246',
            'type' => 'member',
            'fechaAlta' => '1991-07-10',
            'domicilio_id' => '1'
        ]
    );
    App\User::create(
        [
            'name' => 'Bernardo',
            'apellido' => 'Etienot',
            'email' => 'beretienot@gmail.com',
            'turno' => 'maniana',
            'password' => bcrypt('mamadera'),
            'telefono' => '3814',
            'dni' => '3246',
            'type' => 'member',
            'fechaAlta' => '1991-07-10',
            'domicilio_id' => '1'
        ]
    );
});
