<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medidaModelo extends Model
{
    use HasFactory;

    protected $table = 'medida';
    protected $fillable = ['medida', 'unidad'];

    // Relación de muchos a uno
    public function producto()
    {
        return $this->belongsTo(producto::class, 'producto_id');
    }
}
