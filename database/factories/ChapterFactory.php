<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Modules\Chapter\Chapter::class, function (Faker $faker) {
    return [
        'id_ref' => $faker->numberBetween(1, 20),
        'chapter_name' => $faker->text(10),
        'chapter_budgeted' => $faker->randomFloat(NULL, 0, NULL),
        'project_id' => \App\Modules\Project\Project::all()->random()->id
    ];
});
