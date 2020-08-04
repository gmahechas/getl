<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Modules\Invoice\Invoice::class, function (Faker $faker) {
    return [
        'id_ref' => $faker->numberBetween(1, 20),
        'invoice_number' => $faker->randomNumber(NULL, false),
        'invoice_date' => $faker->date('Y-m-d', 'now'),
        'invoice_responsable' => $faker->name,
        'invoice_total' => $faker->randomFloat(NULL, 0, NULL),
        'contract_id' => \App\Modules\Contract\Contract::all()->random()->id
    ];
});
