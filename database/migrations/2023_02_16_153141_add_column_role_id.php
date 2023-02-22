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
            $table->bigInteger('cat_roles_id')->unsigned()->default(1)->after('user_id');
            $table->foreign('cat_roles_id')->references('id')->on('cat_roles')->onDelete('cascade')->onUpdate('cascade');
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
            $table->dropColumn(['cat_roles_id']);
        });
    }
};
