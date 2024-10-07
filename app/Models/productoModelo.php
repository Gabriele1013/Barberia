<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productoModelo extends Model
{
    use HasFactory;

    protected $table = 'producto';
    protected $fillable = ['nombre', 'desc', 'medida_id', 'precio', 'expira', 'codigo', 'popularidad', 'imagenUrl'];

    public function medida()
    {
        return $this->belongsTo(medida::class, 'medida_id');
    }

    public function producto_orden(){
        return $this->hasMany(producto_orden::class, 'producto_id');
    }
}
