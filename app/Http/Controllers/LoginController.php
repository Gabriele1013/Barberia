<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\usuarioModelo; // Mantener el modelo de usuario
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Vista para el formulario de login
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Verificar solo en la tabla de usuarios
        $usuario = usuarioModelo::where('email', $request->email)->first();

        if ($usuario && Hash::check($request->password, $usuario->password)) {
            // Si las credenciales coinciden con un usuario
            Auth::login($usuario);
            // Redirigir al menú sin rol específico
            return redirect()->intended('/menu')->with('role', 'usuario'); // Añadir 'usuario' en el session
        }

        // Si las credenciales no coinciden con ningún usuario
        return redirect()->back()->with('error', 'Correo o contraseña incorrectas');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/'); // O redirige a donde quieras
    }
}
