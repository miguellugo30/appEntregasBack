<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctl_paquetes', function (Blueprint $table) {
            $table->id();
            $table->string("guia_rastreo", 50)->nullable(false);
            $table->string("nombre_cliente", 50)->nullable(false);
            $table->string("telefono", 15)->nullable(false);
            $table->string("correo_electronico", 50)->nullable();
            $table->string("direccion", 100)->nullable(false);
            $table->string("no_exterior", 5)->nullable(false);
            $table->string("no_interior", 5)->nullable();
            $table->string("colonia", 50)->nullable(false);
            $table->string("alcaldia_municipio", 80)->nullable(false);
            $table->string("codigo_postal", 10)->nullable(false);
            $table->string("estado", 80)->nullable(false);
            $table->text("referencias")->nullable();
            $table->string("coord_latitud",20)->nullable();
            $table->string("coord_longitud", 20)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ctl_paquetes');
    }
};
