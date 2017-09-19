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
    static $password;
    $genders = ['male', 'female'];
    $gender = $genders[array_rand($genders)];
    
    return [
        'name' => $faker->name($gender),
        'email' => $faker->unique()->safeEmail,
        'firebase_uid' => str_random(28),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'age' => random_int(18, 70),
        'gender' => $gender,
    ];
});
