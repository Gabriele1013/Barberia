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
        Schema::create('turno', function (Blueprint $table) {
            $table->id(); // id de la tabla de servicios (shifts) - clave primaria
            $table->string('nombre')->nullable(false); // nombre del servicio
            $table->text('desc'); // descripción de servicio
            $table->decimal('precio', 8, 2)->nullable(false); // precio del servicio
            $table->foreignId('usuario_id')->constrained('usuario')->onDelete('cascade'); // clave foranea
            $table->datetime('fecha_inicio')->nullable(false); // fecha y hora inicial del turno
            $table->datetime('fecha_fin')->nullable(false); // fecha y hora final del turno
            $table->string('estado')->nullable(false);
            $table->timestamps(); // fecha de datos creados y actualizados
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turno');
    }
};
