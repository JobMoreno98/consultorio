<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('CREATE VIEW pacientes_ciclos as SELECT citas.*,pacientes.nombre,pacientes.telefono,pacientes.comentarios as comentarios_paciente FROM citas left JOIN pacientes ON pacientes.id = citas.paciente_id;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW pacientes_ciclos");
    }
};
