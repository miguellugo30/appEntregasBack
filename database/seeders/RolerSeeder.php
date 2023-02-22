<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RolerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_roles')->insert([
            'nombre' => 'Administrador',
        ]);
        DB::table('cat_roles')->insert([
            'nombre' => 'Repartidor',
        ]);
        DB::table('cat_roles')->insert([
            'nombre' => 'Asistente',
        ]);

    }
}
