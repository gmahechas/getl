<?php

use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Invoice\Invoice::truncate();
        \App\Modules\Invoice\Invoice::flushEventListeners();
        factory(\App\Modules\Invoice\Invoice::class, 10)->create();
    }
}
