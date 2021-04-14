<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\NotificacionesController;

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
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas Protegidas
Route::group(['middleware'=>['auth','verified']], function(){
    // Rutas de vacantes
    Route::get('/vacantes',[VacanteController::class,'index'])->name('vacantes.index');
    Route::get('/vacantes/create',[VacanteController::class,'create'])->name('vacantes.create');
    Route::post('/vacantes/store',[VacanteController::class,'store'])->name('vacantes.store');

    // Subir Imágenes
    Route::post('/vacantes/imagen',[VacanteController::class,'imagen'])->name('vacantes.imagen');
    Route::post('/vacantes/borrarimagen',[VacanteController::class,'borrarimagen'])->name('vacantes.borrarimagen');
    
    // Cambiar estado de la vacante
    Route::post('/vacantes/{vacante}',[VacanteController::class,'estado'])->name('vacantes.estado');

    // Notificaciones
    Route::get('/notificaciones',NotificacionesController::class)->name('notificaciones');
});

// Muestra los trabajos en el front sin autenticacion
Route::get('/vacantes/{vacante}',[VacanteController::class,'show'])->name('vacantes.show');

//Enviar datos para una vacante
Route::get('/candidatos/{vacante}',[CandidatoController::class,'index'])->name('candidatos.index');
Route::post('/candidatos/store',[CandidatoController::class,'store'])->name('candidatos.store');
