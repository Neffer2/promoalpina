<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;   


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
    return view('auth.login');
})->middleware(['guest']);

Route::get('/dashboard', [HomeController::class ,'show_dash'])->middleware(['auth'])->name('dashboard');

Route::get('/registrar', [HomeController::class ,'show_registrar'])->middleware(['auth'])->name('registrar');
Route::post('/registrar', [HomeController::class ,'registrar_action'])->middleware(['auth'])->name('registrar');


Route::get('/cargar_factura', [HomeController::class ,'cargar_factura'])->middleware(['auth'])->name('cargar_factura');

Route::get('/consultar_puntos', [HomeController::class ,'show_consultar_puntos'])->middleware(['auth'])->name('consultar_puntos');
Route::post('/consultar_puntos', [HomeController::class ,'consultar_puntos'])->middleware(['auth'])->name('consultar_puntos');

require __DIR__.'/auth.php';
