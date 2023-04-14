<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\LoginController;
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
Route::get('inicio/{nombre}/{dias_trabajados}',[EmpleadosController::class,'saludo']);
Route::get('salir_nomina',[EmpleadosController::class, 'salir'])->name('salir');

// ELOQUENT
// Route::get('eloquent', [EmpleadosController::class,'eloquent'])->name('eloquent');

// LOGIN
Route::get('/',[LoginController::class, 'login'])->name('login');
Route::post('login_access',[LoginController::class, 'login_access'])->name('login_access');
Route::get('principal', [LoginController::class, 'principal'])->name('principal');
Route::get('cerrar_sesion',  [LoginController::class, 'cerrar_sesion'])->name('cerrar_sesion');
Route::get('redirect',  [LoginController::class, 'redirect'])->name('redirect');

// CREAR EMPLEADOS
Route::get('alta_empleado',[EmpleadosController::class, 'alta_empleado'])->name('alta_empleado');
Route::post('guardar_empleado',[EmpleadosController::class, 'guardar_empleado'])->name('guardar_empleado');

// LISTAR EMPLEADOS
Route::get('listar_empleados',[EmpleadosController::class, 'listar_empleados'])->name('listar_empleados');

// BORRAR EMPLEADOS
Route::get('desactivar_empleado/{id_empleado}', [EmpleadosController::class, 'desactivar_empleado'])->name('desactivar_empleado');
Route::get('activar_empleado/{id_empleado}', [EmpleadosController::class, 'activar_empleado'])->name('activar_empleado');
Route::get('borrar_empleado/{id_empleado}', [EmpleadosController::class, 'borrar_empleado'])->name('borrar_empleado');

// MODIFICAR EMPLEADO
Route::get('modificar_empleado/{id_empleado}',[EmpleadosController::class, 'modificar_empleado'])->name('modificar_empleado');
Route::post('actualizar_empleado',[EmpleadosController::class, 'actualizar_empleado'])->name('actualizar_empleado');