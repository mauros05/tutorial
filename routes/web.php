<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmpleadosController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// RUTAS DE PRUEBA
Route::get('mensaje', [EmpleadosController::class,'mensaje']);
Route::get('pago', [EmpleadosController::class,'pago']);
Route::get('nombre/{nombre}/{apellido}', [EmpleadosController::class,'nombre']);

// RUTAS DE CONTROLLER EMPLEADO
Route::get('inicio/{nombre}/{dias_trabajados}',[EmpleadosController::class,'saludo']);
Route::get('salir_nomina',[EmpleadosController::class, 'salir'])->name('salir');
Route::get('/',[EmpleadosController::class, 'bootstrap'])->name('bootstrapview');

Route::get('alta_empleado',[EmpleadosController::class, 'alta_empleado'])->name('alta_empleado');
Route::post('guardar_empleado',[EmpleadosController::class, 'guardar_empleado'])->name('guardar_empleado');

Route::get('eloquent', [EmpleadosController::class,'eloquent'])->name('eloquent');


// Route::get('/ruta1',function(){
//     return "hola mundo";
// });

// Route::get('/redireccionamiento', function(){
//     return redirect ('/');
// });

// Route::redirect('redireccionamiento2', 'ruta1');