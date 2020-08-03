<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Modules\Project\Project::class, function (Faker $faker) {
    $macroproject = \App\Modules\Macroproject\Macroproject::all()->random();
    return [
        'project_name' => $faker->name,
        'id_ref' => $macroproject->id_ref,
        'project_financing' => $faker->randomFloat(NULL, 0, NULL),
        'macroproject_id' => $macroproject->id
    ];
});
