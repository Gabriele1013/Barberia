<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usuarioController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Devolver datos desde el servidor
Route::get('/get',function(){
    return 'has obtenido todos los datos..';
   });

//Devolver unicamente un registro
    Route::get('/get/{user_id}',function(){
    return 'Has obtenido solo un registro';
   });

//Actualizar datos
    Route::put('/update/{user_id}',function(){
    return 'Data update';
   });
   
//Elimina datos
Route::delete('/delete/{user_id}',function(){
    return 'Data delete';
   });

//Como podré crear una ruta que me permita
//Almacenar datos en la BD
Route::post('/save', function(){
    return 'Datos guardados de manera exitosa..';
});

use App\Http\Controllers\RegistroController;

Route::get('/registro', [RegistroController::class, 'create'])->name('registro.create');
Route::post('/registro', [RegistroController::class, 'store'])->name('registro.store');
