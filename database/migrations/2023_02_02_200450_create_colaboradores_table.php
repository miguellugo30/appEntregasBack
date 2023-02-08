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
        Schema::create('cat_colaboradores', function (Blueprint $table) {
            $table->id();
            $table->string("nombre", 50)->nullable(false);
            $table->string("apellido_paterno", 50)->nullable(false);
            $table->string("apellido_materno", 50)->nullable(false);
            $table->string("telefono", 15)->nullable(false);
            $table->string("correo_electronico", 50)->nullable(true);
            $table->string("ruta_perfil", 150)->nullable(true);
            $table->tinyInteger("activo")->default(1);
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('colaboradores');
    }
};
