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
        Schema::create('tarjeta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuario')->onDelete('cascade');
            $table->string('titular')->nulalble(false);
            $table->string('numero_cuenta')->nulalble(false);
            $table->integer('ano_fin')->nulalble(false);
            $table->integer('mes_fin')->nulalble(false);
            $table->string('cvv')->nulalble(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarjeta');
    }
};
