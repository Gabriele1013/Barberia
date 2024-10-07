<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordenModelo extends Model
{
    use HasFactory;

    protected $table = 'orden';
    protected $fillable = ['codigo_orden', 'precio_total', 'estado', 'usuario_id'];

    public function producto_orden(){
        return $this->hasMany(producto_orden::class, 'orden_id');
    }

    public function usuario(){
        return $this->hasOne(usuario::class, 'usuario_id');
    }
}
