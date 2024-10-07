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
        Schema::create('notificacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('turno_asignado_id')->constrained('turno_asignado')->onDelete('cascade');
            $table->string('notificacion_usuario');
            $table->string('notificacion_empleado');
            $table->boolean('vista_usuario')->default(true); // true para "Si", false para "No"
            $table->boolean('vista_empleado')->default(true); // true para "Si", false para "No"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificacion');
    }
};
