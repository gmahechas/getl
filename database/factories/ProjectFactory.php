<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Modules\Project\Project::class, function (Faker $faker) {
    return [
        'project_name' => $faker->name,
        'id_ref' => $faker->numberBetween(1, 20),
        'project_financing' => $faker->randomFloat(NULL, 0, NULL),
        'macroproject_id' => \App\Modules\Macroproject\Macroproject::all()->random()->id
    ];
});
