<?php

namespace App\Http\Controllers;

use App\Models\{turnoModelo, productoModelo, usuarioModelo};
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Obtener los 8 turnos más cercanos con estado "Disponible"
        $turnos = turnoModelo::where('fecha_inicio', '>=', now())
            ->where('estado', 'Disponible') // Filtrar por estado
            ->orderBy('fecha_inicio', 'asc')
            ->take(8)
            ->get();

        // Obtener los 7 productos más populares
        $productos = productoModelo::orderBy('popularidad', 'desc')
            ->take(7)
            ->get();

        return view('menu', compact('turnos', 'productos'));
    }

    public function show($id)
    {
        $turno = turnoModelo::findOrFail($id); // Encuentra el turno por su id o retorna error 404

        return view('turno.show', compact('turno')); // Retorna la vista del turno
    }


}
