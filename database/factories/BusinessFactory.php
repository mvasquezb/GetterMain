<?php

use Faker\Generator as Faker;

$factory->define(App\Business::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'owner_id' => factory(App\User::class)->create()->id,
    ];
});
