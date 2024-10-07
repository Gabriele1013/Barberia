<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accionEmpleadoTurnoModelo extends Model
{
    use HasFactory;

    protected $table = 'accion_empleado_turno';
    protected $fillable = ['turno_asignado_id', 'solicitud', 'motivo', 'respuesta'];

    public function turno_asignado(){
        return $this->hasOne(turno_asignado::class, 'turno_asignado_id');
    }
}
