<?php

use Illuminate\Database\Seeder;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Contract\Contract::truncate();
        \App\Modules\Contract\Contract::flushEventListeners();
        factory(\App\Modules\Contract\Contract::class, 10)->create();
    }
}
