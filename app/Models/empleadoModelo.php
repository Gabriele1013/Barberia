<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as AuthenticatableBase;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleadoModelo extends AuthenticatableBase implements Authenticatable
{
    use HasFactory;

    protected $table = 'empleado';
    protected $fillable = ['ci', 'nombre', 'apellido', 'email', 'telefono', 'password', 'cumple', 'rol'];

    public function turno()
    {
        return $this->hasMany(turno::class, 'empleado_id');
    }

    public function resena()
    {
        return $this->hasMany(resena::class, 'empleado_id');
    }
}
