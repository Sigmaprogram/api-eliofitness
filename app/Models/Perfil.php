<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfiles'; // Asegúrate de que tu tabla se llame así

    protected $fillable = [
        'usuario_id',
        'altura',
        'objetivo_principal',
        'nivel_actividad',
        'condiciones_medicas',
        'alergias',
        'experiencia_ejercicio',
    ];

    // Relación con el modelo Usuario (User)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
