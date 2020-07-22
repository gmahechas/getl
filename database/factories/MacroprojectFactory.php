<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modules\Macroproject;
use Faker\Generator as Faker;

$factory->define(\App\Modules\Macroproject\Macroproject::class, function (Faker $faker) {
    return [
        'macroproject_name' => $faker->name,
    ];
});
