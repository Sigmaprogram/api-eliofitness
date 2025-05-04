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
        Schema::create('ejercicios_rutina', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dia_id')->constrained('dias_rutina')->onDelete('cascade');
            $table->foreignId('ejercicio_id')->constrained('ejercicios')->onDelete('restrict');
            $table->integer('sets');
            $table->string('repeticiones');
            $table->string('peso');
            $table->integer('descanso');
            $table->integer('orden');
            $table->text('notas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejercicios_rutina');
    }
};
