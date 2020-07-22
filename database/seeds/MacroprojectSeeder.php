<?php

use Illuminate\Database\Seeder;

class MacroprojectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Macroproject\Macroproject::truncate();
        \App\Modules\Macroproject\Macroproject::flushEventListeners();
        factory(\App\Modules\Macroproject\Macroproject::class, 10)->create();
    }
}
