<?php

use App\Http\Controllers\CirugiaController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\PacienteController;
use App\Models\Historial;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('pacientes', PacienteController::class);

Route::post('paciente.nombre', [PacienteController::class, 'nombrePaciente'])->name('paciente.nombre');

Route::post('propietario.nombre', [PacienteController::class, 'nombrePropietario'])->name('propietario.nombre');

Route::post('propietario.rut', [PacienteController::class, 'rutPropietario'])->name('propietario.rut');

Route::get('existente', [PacienteController::class, 'viewExistente'])->name('pacientes.existente');

Route::post('propietario.existente', [PacienteController::class, 'buscarPropietario'])->name('propietario.existente');

Route::post('store.existente', [PacienteController::class, 'storeExistente'])->name('store.existente');

Route::resource('historial', HistorialController::class);

Route::get('registrar/{paciente}', [HistorialController::class, 'viewRegistrar'])->name('historial.registrar');


Route::resource('consultas', ConsultaController::class);

Route::post('consultas/filtrar', [ConsultaController::class, 'filtrar'])->name('consultas.filtrar');


Route::resource('cirugias', CirugiaController::class);

Route::post('cirugias/filtrar', [CirugiaController::class, 'filtrar'])->name('cirugias.filtrar');