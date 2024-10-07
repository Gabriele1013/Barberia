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
        Schema::create('empleado', function (Blueprint $table) {
            $table->id(); // clave primaria de la tabla de trabajadores (employee)
            $table->string('ci')->unique()->nullable(false); // cedula del trabajador
            $table->string('nombre')->nullable(false); // nombre del trabajador
            $table->string('apellido')->nullable(false); // apellidos del trabajador
            $table->string('email')->unique()->nullable(false); // correo del trabajador
            $table->string('telefono'); // numero del trabajador
            $table->string('password')->nullable(false); // contraseña del trabajador
            $table->date('cumple'); // año de nacimiento del trabajador
            $table->string('rol')->notnull();
            $table->timestamps(); // fecha de datos creados y actualizados
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado');
    }
};
