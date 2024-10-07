<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Cambia a Authenticatable
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class usuarioModelo extends Authenticatable // Extiende Authenticatable
{
    use Notifiable, HasFactory;

    protected $table = 'usuario'; // Nombre de la tabla
    protected $fillable = ['ci', 'nombre', 'apellido', 'email', 'rol_id', 'telefono', 'password', 'apodo', 'cumple'];

    // Ocultar la contraseña al devolver datos del modelo
    protected $hidden = ['password', 'remember_token'];

    public function rol()
    {
        return $this->belongsTo(rol::class, 'rol_id');
    }

    /**
     * Relación uno a muchos con la tabla tarjeta.
     */
    public function tarjeta()
    {
        return $this->hasMany(tarjeta::class, 'usuario_id');
    }

    
    public function cliente()
    {
        return $this->belongsTo(usuario::class, 'usuario1_id');  // usuario1_id es el cliente
    }

    public function empleado()
    {
        return $this->belongsTo(usuario::class, 'usuario2_id');  // usuario2_id es el empleado
    }


    /**
     * Relación uno a muchos con la tabla Orden.
     */
    public function orden()
    {
        return $this->hasMany(orden::class, 'usuario_id');
    }

    /**
     * Relación uno a muchos con la tabla TurnoAsignado.
     */
    public function turno_asignado()
    {
        return $this->hasOne(turno_asignado::class, 'usuario_id');
    }

    // Método para obtener la contraseña cifrada
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function turno()
    {
        return $this->hasMany(turno::class, 'usuario_id');
    }
}
