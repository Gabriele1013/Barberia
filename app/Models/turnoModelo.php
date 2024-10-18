<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\usuarioModelo;

class turnoModelo extends Model
{
    use HasFactory;

    protected $table = 'turno';
    protected $fillable = ['nombre', 'desc', 'precio', 'usuario_id', 'fecha_inicio', 'fecha_fin', 'estado'];

    // Relación de muchos a uno
    // Turno solo puede tener un Empleado
    // Empleado puede tener varios Turnos
    public function usuario()
    {
        return $this->belongsTo(usuarioModelo::class, 'usuario_id');
    }

    // Relación de uno a uno
    // Turno solo puede tener un Turno Asignado
    // Turno Asignado solo puede tener un Turno
    public function turno_asignado()
    {
        return $this->hasOne(turnoAsignadoModelo::class, 'turno_asignado_id');
    }
}
