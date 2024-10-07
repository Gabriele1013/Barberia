<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuarioModelo; 



class AdministracionController extends Controller
{
    public function index()
    {
        return view('administracion.index'); // Cargar la vista de administración
    }

    public function actualizarDatos(Request $request)
    {
        $request->validate([
            'telefono' => 'required|string|max:255',
            'apodo' => 'nullable|string|max:255',
        ]);

        $user = auth()->user();
        $user->telefono = $request->telefono ?: 'null';
        $user->apodo = $request->apodo ?: 'null'; // Si el apodo es vacío, se guarda como 'null'
        $user->save();

        return response()->json(['success' => true]);
    }

    public function empleados()
{
    // Obtener todos los usuarios con rol_id 1, 2, 3 o 4
    $empleados = usuarioModelo::with('rol')->whereIn('rol_id', [1, 2, 3, 4])->get();

    return view('administracion.empleados', compact('empleados'));
}
}
