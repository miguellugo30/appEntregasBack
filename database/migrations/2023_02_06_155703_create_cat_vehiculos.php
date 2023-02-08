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
        Schema::create('cat_vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('marca', 50)->nullable(false);
            $table->string('modelo', 50)->nullable(false);
            $table->string('anio', 10)->nullable(false);
            $table->string('placas', 10)->nullable(false);
            $table->tinyInteger("activo")->default(1);
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
        Schema::dropIfExists('cat_vehiculos');
    }
};
