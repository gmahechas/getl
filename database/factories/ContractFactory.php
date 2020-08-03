<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Modules\Contract\Contract::class, function (Faker $faker) {
    return [
        'id_ref' => $faker->numberBetween(1, 20),
        'contract_provider' => $faker->name,
        'contract_budgeted' => $faker->randomFloat(NULL, 0, NULL),
        'activity_id' => \App\Modules\Activity\Activity::all()->random()->id
    ];
});
