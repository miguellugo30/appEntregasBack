<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatVehiculos extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_vehiculos')->insert([
            'marca' => 'Sin marca',
            'modelo' => 'Sin modelo',
            'anio' => '0000',
            'placas' => '000-000',
            'activo' => 0,
            'tipo' => 'Sedán',
        ]);
    }
}
