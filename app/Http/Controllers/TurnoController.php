<?php

namespace App\Http\Controllers;

use App\Models\{usuarioModelo, turnoModelo}; // Asegúrate de importar tu modelo
use Illuminate\Http\Request;
use Carbon\Carbon;

class TurnoController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el usuario seleccionado desde el request
        $usuarioId = $request->input('usuario_id');
        $fechaSeleccionada = $request->input('fecha'); // Obtener la fecha seleccionada

        // Inicializar la colección de turnos
        $turnos = collect();

        // Obtener todos los usuarios con rol_id entre 2 y 4 que tengan turnos actuales o futuros
        $usuarios = usuarioModelo::whereBetween('rol_id', [2, 4])
            ->whereHas('turno', function ($query) {
                $query->where('fecha_inicio', '>=', Carbon::now()->addHour()); // Excluir turnos en la próxima hora
            })
            ->get();

        // Obtener los turnos del usuario seleccionado para la fecha seleccionada
        if ($usuarioId) {
            $turnos = turnoModelo::where('usuario_id', $usuarioId)
                ->whereDate('fecha_inicio', $fechaSeleccionada ?: Carbon::today()) // Filtrar por fecha de inicio igual a la seleccionada o hoy si no hay fecha
                ->where('fecha_inicio', '>=', Carbon::now()) // Mostrar todos los turnos que comienzan desde ahora
                ->orderBy('fecha_inicio') // Ordenar por fecha de inicio
                ->get(); // Esto devuelve una colección de Eloquent
        }

        return view('turno.index', compact('usuarios', 'turnos', 'usuarioId', 'fechaSeleccionada'));
    }

    public function seleccionarUsuario(Request $request)
    {
        // Validar la selección
        $request->validate([
            'usuario' => 'required|exists:usuario,id', // Asegúrate de que el ID exista
        ]);

        // Almacenar el usuario seleccionado en la sesión
        $request->session()->put('usuario_seleccionado', $request->usuario);

        return redirect()->route('turno.index'); // Redirigir a la misma página
    }

    public function reset(Request $request)
    {
        // Limpiar el usuario seleccionado de la sesión
        $request->session()->forget('usuario_seleccionado');

        return redirect()->route('turno.index'); // Redirigir a la misma página
    }

    public function show($id)
    {
        $turno = turnoModelo::with('usuario')->findOrFail($id);
        return view('turno.show', compact('turno'));
    }
}
