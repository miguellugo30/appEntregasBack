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
        Schema::table('cat_colaboradores', function (Blueprint $table) {
            $table->bigInteger('cat_vehiculos_id')->unsigned()->after('user_id')->default(1);
            $table->foreign('cat_vehiculos_id')->references('id')->on('cat_vehiculos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cat_colaboradores', function (Blueprint $table) {
            $table->dropColumn(['cat_vehiculos_id']);
        });
    }
};
