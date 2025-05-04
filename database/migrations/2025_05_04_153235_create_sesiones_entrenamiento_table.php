<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sesiones_entrenamiento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('entrenador_id')->constrained('empleados')->onDelete('restrict');
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('tipo', 50)->nullable()->comment('personal, grupal');
            $table->enum('estado', ['programada', 'completada', 'cancelada']);
            $table->text('notas')->nullable();
            $table->timestamps();
        });

        // Añadir la restricción CHECK usando SQL crudo
        DB::statement('ALTER TABLE sesiones_entrenamiento ADD CONSTRAINT check_hora_fin_mayor CHECK (hora_fin > hora_inicio)');
    }

    public function down()
    {
        // Primero eliminar la restricción CHECK
        DB::statement('ALTER TABLE sesiones_entrenamiento DROP CONSTRAINT IF EXISTS check_hora_fin_mayor');
        
        Schema::dropIfExists('sesiones_entrenamiento');
    }
};