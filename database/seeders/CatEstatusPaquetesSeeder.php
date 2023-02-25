<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatEstatusPaquetesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_estatus_paquete')->insert([
            'nombre' => 'Recibido en almacen',
        ]);
        DB::table('cat_estatus_paquete')->insert([
            'nombre' => 'Preparado para salir',
        ]);
        DB::table('cat_estatus_paquete')->insert([
            'nombre' => 'En ruta de entrega',
        ]);
        DB::table('cat_estatus_paquete')->insert([
            'nombre' => 'Entregado',
        ]);
        DB::table('cat_estatus_paquete')->insert([
            'nombre' => 'Devuelto',
        ]);
        DB::table('cat_estatus_paquete')->insert([
            'nombre' => 'No entregado',
        ]);

    }
}
