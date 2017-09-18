<?php

use Faker\Generator as Faker;

$factory->define(App\Person::class, function (Faker $faker) {
    $genders = ['male', 'female'];
    $gender = $genders[array_rand($genders)];
    return [
        'name' => $faker->name($gender),
        'age' => random_int(18, 70),
        'gender' => $gender,
        'user_id' => factory(\App\User::class)->create()->id,
    ];
});
