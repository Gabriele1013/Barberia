<?php

namespace App\Http\Controllers;

use App\Models\turnoModelo;
use App\Models\productoModelo;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Obtener los 8 turnos más cercanos a la fecha actual
        $turnos = turnoModelo::where('fecha_inicio', '>=', now())
            ->orderBy('fecha_inicio', 'asc')
            ->take(8)
            ->get();

        // Obtener los 7 productos más populares
        $productos = productoModelo::orderBy('popularidad', 'desc')
            ->take(7)
            ->get();

        return view('menu', compact('turnos', 'productos'));
    }

}
