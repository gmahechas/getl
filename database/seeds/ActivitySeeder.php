<?php

use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Activity\Activity::truncate();
        \App\Modules\Activity\Activity::flushEventListeners();
        factory(\App\Modules\Activity\Activity::class, 10)->create();
    }
}
