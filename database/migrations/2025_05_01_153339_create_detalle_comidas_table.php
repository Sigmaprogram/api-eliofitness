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
        Schema::create('detalle_comidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comida_id')->constrained('comidas')->onDelete('cascade');
            $table->foreignId('alimento_id')->constrained('alimentos')->onDelete('restrict');
            $table->decimal('cantidad');
            $table->string('unidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_comidas');
    }
};
