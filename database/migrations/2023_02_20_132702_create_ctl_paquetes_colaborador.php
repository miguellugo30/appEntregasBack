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
        Schema::create('ctl_paquetes_colaborador', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cat_colaboradores_id')->unsigned();
            $table->bigInteger('ctl_paquetes_id')->unsigned();
            $table->foreign('cat_colaboradores_id')->references('id')->on('cat_colaboradores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ctl_paquetes_id')->references('id')->on('ctl_paquetes')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('ctl_paquetes_colaborador');
    }
};
