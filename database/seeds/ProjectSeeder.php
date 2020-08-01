<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Project\Project::truncate();
        \App\Modules\Project\Project::flushEventListeners();
        factory(\App\Modules\Project\Project::class, 10)->create();
    }
}
