<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VisitantesController;
use App\Http\Controllers\EquiposController;

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

//Route::get('/', function () {
//    return view('login/login');
//});


Route::controller(LoginController::class)->group(function(){
	Route::post('login_valida', 'validalogin');
	Route::post('logout', 'logout');
});

Route::controller(VisitantesController::class)->group(function(){
	Route::post('visitantes_registro', 'registravisita');
	Route::post('consulta_visitantes', 'validavisitante');
	Route::post('visitantes_salida',   'salidavisintante');
	Route::get('visitantesconsulta', 'visitantesregistrados')->middleware('auth');
});

Route::controller(EquiposController::class)->group(function(){
	Route::post('consultaequipo', 'validaequipo');
	Route::post('registrarequipo', 'registraequipo');
	Route::get('table', 'consultatable');
	Route::get('salidaequipo', 'equiposalida');
	Route::get('salidaequipodash', 'equiposalidadash');
	Route::get('dashboard', 'consultatable')->middleware('auth');
});



//Route::view('dashboard', 'paginas.dashboard')->middleware('auth');
Route::view('inicio', 'paginas.inicio')->name('inicio')->middleware('auth');
Route::view('/', 'login.login')->name('login')->middleware('guest');
Route::view('visitantes', 'paginas.visitantes')->name('visitantes')->middleware('auth');
Route::view('salida', 'paginas.visitantes_salida')->name('salida')->middleware('auth');
Route::view('equipo', 'paginas.equipos')->name('equipo')->middleware('auth');
Route::view('registraequipo', 'paginas.registraequipo')->name('requipo')->middleware('auth');
//Route::get('inicio', [LoginController::class, 'validalogin']);
