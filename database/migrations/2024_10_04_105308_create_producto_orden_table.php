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
        Schema::create('producto_orden', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')->constrained('producto')->onDelete('cascade');
            $table->integer('cantidad')->nullable(false);
            $table->foreignId('orden_id')->constrained('orden')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_orden');
    }
};
