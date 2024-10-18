<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resenaModelo extends Model
{
    use HasFactory;

    protected $table = 'resena';
    protected $fillable = ['usuario1_id', 'usuario2_id', 'stars'];

    public function usuario(){
        return $this->hasOne(usuario::class, 'usuario_id');
    }

    public function empleado(){
        return $this->hasOne(empleado::class, 'empleado_id');
    }
}
