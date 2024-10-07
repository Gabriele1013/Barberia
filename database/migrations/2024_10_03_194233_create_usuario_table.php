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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id(); // id del usuario
            $table->string('ci')->unique()->nullable(false); // cedula del usuario
            $table->string('nombre')->nullable(false); // nombre del usuario
            $table->string('apellido')->nullable(false); // apellido del usuario
            $table->string('email')->unique()->nullable(false); // correo del usuario
            $table->foreignId('rol_id')->constrained('rol')->onDelete('cascade');
            $table->string('telefono'); // numero del usuario
            $table->string('password')->nullable(false); // contraseña del usuario
            $table->string('apodo'); // apodo del usuario
            $table->date('cumple'); // año de nacimiento del usuario
            $table->timestamps(); // fecha de datos creados y actualizados
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
