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
        Schema::create('producto', function (Blueprint $table) {
            $table->id(); // id del producto
            $table->string('nombre'); // nombre del producto
            $table->string('desc'); // descripcion del producto
            $table->foreignId('medida_id')->constained('res_measures')->onDelete('cascade'); // 100ml, 200ml, 300ml clave foranea de tabla de medidas
            $table->decimal('precio', 8, 2); // precio del producto
            $table->date('expira'); // estado del producto (perfecto, vencido)
            $table->string('codigo');
            $table->integer('popularidad');
            $table->string('imagenUrl');
            $table->timestamps(); // fecha de datos creados y actualizados
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
