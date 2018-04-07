<?php

use Faker\Generator as Faker;
use hash;
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
        'name' => 'test',
        'username' => 'faker',
        'password' => hash::make('faker'),
        'remember_token' => str_random(10),
    ];
});
