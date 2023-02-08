<?php

namespace Database\Seeders;

use Database\Factories\CtlPaquetesFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaquetesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CtlPaquetesFactory::factory()->count(10)->create();
    }
}
