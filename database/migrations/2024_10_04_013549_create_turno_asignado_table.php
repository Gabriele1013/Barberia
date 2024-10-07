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
        Schema::create('turno_asignado', function (Blueprint $table) {
            $table->id();
            $table->foreignId('turno_id')->constrained('turno')->onDelete('cascade'); // clave foranea del turno
            $table->foreignId('usuario_id')->constrained('usuario')->onDelete('cascade'); // clave foranea del usuario/cliente
            $table->string('estado')->nullable(false);
            $table->string('codigo')->nullable(false);
            $table->timestamps(); // fecha de datos creados y actualizados
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turno_asignado');
    }
};
