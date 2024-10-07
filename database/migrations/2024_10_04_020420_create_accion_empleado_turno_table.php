<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accion_empleado_turno', function (Blueprint $table) {
            $table->id();
            $table->foreignId('turno_asignado_id')->constrained('turno_asignado')->onDelete('cascade');
            $table->enum('solicitud', ['Cancelar y Reembolsar']); 
            $table->text('motivo');
            $table->string('respuesta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accion_empleado_turno');
    }
};
