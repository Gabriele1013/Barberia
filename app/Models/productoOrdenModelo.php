<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productoOrdenModelo extends Model
{
    use HasFactory;

    protected $table = 'producto_orden';
    protected $fillable = ['producto_id', 'cantidad', 'orden_id'];

    public function producto(){
        return $this->hasOne(producto::class, 'producto_id');
    }

    public function orden(){
        return $this->hasOne(orden::class, 'orden_id');
    }
}
