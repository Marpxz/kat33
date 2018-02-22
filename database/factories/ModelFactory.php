<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Kat33\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Kat33\Vehicle::class, function (Faker\Generator $faker) {

    return [
        'model'  => $faker->text(6),
        'patent' => $faker->text(6),
        'type'   => $faker->randomElement($array = array ('auto','camioneta','moto')),
    ];
});
$factory->define(Kat33\Business::class, function (Faker\Generator $faker) {

    return [
        'name'  => $faker->unique()->text(6),

    ];
});