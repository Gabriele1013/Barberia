<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{RegistroController, 
                            LoginController, 
                            MenuController, 
                            AdministracionController,
                            TurnoController};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registro', [RegistroController::class, 'create'])->name('registro.create');
Route::post('/registro', [RegistroController::class, 'store'])->name('registro.store');


// Ruta para mostrar el formulario de login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Protege rutas con middleware 'auth'
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});

// Ruta para procesar la autenticación
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/menu'); //Redirigir a la interfaz de menú
})->name('logout');

Route::get('/menu', function () {
    return view('menu');
})->name('menu');


Route::post('/menu', [LoginController::class, 'logout'])->name('logout');
Route::get('/registro', [RegistroController::class, 'create'])->name('registro');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');

// Ruta para la vista de administración
Route::get('/administracion', [AdministracionController::class, 'index'])->name('administracion');

Route::post('/actualizar-datos', [AdministracionController::class, 'actualizarDatos'])->name('actualizar.datos');

// Rutas para administración
Route::group(['prefix' => 'administracion'], function () {
    Route::get('/', [AdministracionController::class, 'index'])->name('administracion');
    Route::get('/empleados', [AdministracionController::class, 'empleados'])->name('administracion.empleados'); // Ruta para empleados
});

// Ruta que apunta a la vista 'turno'
Route::get('/turno', function () {
    return view('turno');
})->name('turno');

// Ruta para mostrar el detalle de un turno específico
Route::get('/turno/{id}', [MenuController::class, 'show'])->name('turno.show');

Route::get('/turno', [TurnoController::class, 'index'])->name('turno.index');

Route::get('/turno', [TurnoController::class, 'index'])->name('turno.index');
Route::post('/turno/seleccionar', [TurnoController::class, 'seleccionarUsuario'])->name('turno.seleccionarUsuario');
Route::get('/turno/reset', [TurnoController::class, 'reset'])->name('turno.reset');


Route::get('/turno/{id}', [TurnoController::class, 'show'])->name('turno.show');