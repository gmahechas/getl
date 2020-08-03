<?php

use Illuminate\Database\Seeder;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Chapter\Chapter::truncate();
        \App\Modules\Chapter\Chapter::flushEventListeners();
        factory(\App\Modules\Chapter\Chapter::class, 10)->create();
    }
}
