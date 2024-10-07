<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model // Cambia "rolModelo" a "Rol"
{
    use HasFactory;

    protected $table = 'rol'; // Nombre de la tabla es "rol"
    protected $fillable = ['rol']; // Nombre del campo que contiene el rol

    public function usuarios()
    {
        return $this->hasMany(usuarioModelo::class, 'rol_id'); // Asegúrate de referenciar el modelo correcto
    }
}
