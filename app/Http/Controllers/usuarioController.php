<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\res_users;
use Illuminate\Support\validator;

class usuarioController extends Controller
{
    //Devuelva todos los registros de la tabla usuario
    public function index()
    {
        $usuarios = res_users::all(); //Trae todos los datos
        return response()->json($usuarios);
    }

    //Devolver un registro de la tabla usuario
    public function registroUnico($id)
    {
        $usuario_id = res_users::find($id);
        return response()->json($usuario_id);
    }

    //Guardar registros en la tabla
    public function store(Request $request)
    {
        // Validación de la información
        $request->validate([
            'user_ci' => 'required',
            'user_name' => 'required',
            'user_last_name' => 'required',
            'user_mail' => 'required|user_mail|unique:users',
            'user_phone',
            'user_password' => 'required',
            'user_nick',
            'user_birthdate'
    ]);

        // Inserción o Creación del Registro
        $usuarios = res_users::create([
            'user_name' => $request -> user_name,
            'user_last_name' => $request -> user_last_name,
            'user_mail' => $request -> user_mail,
            'user_phone' => $request -> user_phone,
            'user_password' => $request -> user_password,
            'user_nick' => $request -> user_nick,
            'user_birthdate' => $request -> user_birthdate
         ]);

         return response()->json($usuarios, 201);
    }


    //Actualizar registro


    //Eliminar registro
}
