<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Modules\Activity\Activity::class, function (Faker $faker) {
    return [
        'id_ref' => $faker->numberBetween(1, 20),
        'activity_name' => $faker->text(10),
        'activity_budgeted' => $faker->randomFloat(NULL, 0, NULL),
        'chapter_id' => \App\Modules\Chapter\Chapter::all()->random()->id
    ];
});
