<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notificacionModelo extends Model
{
    use HasFactory;

    protected $table = 'notificacion';
    protected $fillable = ['turno_asignado_id', 'notificacion_usuario', 'notificacion_empleado', 'vista_usuario', 'vista_empleado'];

    public function turno_asignado()
    {
        return $this->belongsTo(turno_asignado::class, 'turno_asignado_id');
    }
}
