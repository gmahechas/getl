<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call(MacroprojectSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(ChapterSeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(ContractSeeder::class);
        $this->call(InvoiceSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}
