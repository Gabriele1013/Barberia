<?php

namespace App\Http\Controllers;

use App\Models\usuarioModelo;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function create()
    {
        return view('registro'); // Vista para el formulario de registro
    }

    public function store(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'ci' => 'required|string|max:255|unique:usuario,ci',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuario,email',
            'password' => 'required|string|min:8|confirmed',
            'cumple' => 'required|date',
        ]);

        // Asignar el rol_id predeterminado a 5
        $defaultRoleId = 3;

        // Crear el nuevo usuario en la base de datos
        usuarioModelo::create([
            'ci' => $request->ci,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'telefono' => 'null', // Campo con texto "null"
            'apodo' => 'null', // Campo con texto "null"
            'cumple' => $request->cumple,
            'rol_id' => $defaultRoleId, // Asignar el rol predeterminado 5
        ]);

        // Redirigir a la página de login con mensaje de éxito
        return redirect('/login')->with('success', 'Registro exitoso. Puedes iniciar sesión.');
    }
}
