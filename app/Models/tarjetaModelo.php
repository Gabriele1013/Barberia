<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarjetaModelo extends Model
{
    use HasFactory;

    protected $table = 'tarjeta';
    protected $fillable = ['usuario_id', 'titular', 'numero_cuenta', 'ano_fin', 'mes_fin', 'cvv'];

    public function usuario(){
        return $this->hasOne(usuario::class, 'usuario_id');
    }
}
