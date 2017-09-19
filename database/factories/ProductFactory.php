<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'description' => $faker->text,
        'price' => mt_rand(10000, 1000100) / 10000,
        'business_id' => random_int(1, 10),
        'category_id' => random_int(1, 10),
    ];
});
