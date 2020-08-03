<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Modules\Macroproject\Macroproject::class, function (Faker $faker) {
    return [
        'macroproject_name' => $faker->name,
        'id_ref' => $faker->numberBetween(1, 20)
    ];
});
