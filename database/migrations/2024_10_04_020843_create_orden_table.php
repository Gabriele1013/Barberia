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
        Schema::create('orden', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_orden')->nullable(false);
            $table->decimal('precio_total', 8, 2)->nullable(false);
            $table->enum('estado', ['Recoger',"Recogido"])->default('Recoger');
            $table->foreignId('usuario_id')->constrained('usuario')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden');
    }
};
