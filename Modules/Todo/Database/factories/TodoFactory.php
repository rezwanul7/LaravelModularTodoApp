<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\Modules\Todo\Models\Todo::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
    ];
});
