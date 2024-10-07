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
        Schema::create('medida', function (Blueprint $table) {
            $table->id(); // id de medida
            $table->integer('medida')->nullable(false); // medida
            $table->string('unidad')->nullable(false); // unidad de medida
            $table->timestamps(); // fecha de datos creados y actualizados
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medida');
    }
};
