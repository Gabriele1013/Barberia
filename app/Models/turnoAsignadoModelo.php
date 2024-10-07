<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class turnoAsignadoModelo extends Model
{
    use HasFactory;

    protected $table = 'turno_asignado';
    protected $fillable = ['turno_id', 'usuario_id', 'estado', 'codigo'];

    public function usuario()
    {
        return $this->hasOne(usuario::class, 'usuario_id');
    }

    public function turno()
    {
        return $this->hasOne(turno::class, 'turno_id');
    }

    public function notificacion()
    {
        return $this->hasMany(notificacion::class, 'turno_asignado_id');
    }

    public function accion_usuario_turno(){
        return $this->hasOne(accion_usuario_turno::class, 'turno_asignado_id');
    }

    public function accion_empleado_turno(){
        return $this->hasOne(accion_empleado_turno::class, 'turno_asignado_id');
    }
}
