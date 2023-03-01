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
        \DB::unprepared("
                        CREATE OR REPLACE FUNCTION estatus_paquete_asignado() RETURNS trigger AS \$BODY$
                        BEGIN
                            INSERT INTO ctl_paquetes_estatus (cat_estatus_paquetes_id, ctl_paquetes_id, created_at )
                            VALUES (2, NEW.ctl_paquetes_id, NOW());
                            RETURN NEW;
                        END;
                        \$BODY$
                        LANGUAGE plpgsql;
                    ");
        \DB::unprepared("
                        CREATE TRIGGER estatus_paquete_asignado
                        AFTER INSERT ON ctl_paquetes_colaborador
                            FOR EACH ROW EXECUTE FUNCTION estatus_paquete_asignado();
                    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estatus_paquete_asignado()');
    }
};
