<?php

use App\Http\Controllers\ComprobanteController;
use App\Http\Controllers\FirebasseController;
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

Route::get('/',[ComprobanteController::class,'index'])->name('origen');
Route::get('/crear',[ComprobanteController::class,'create'])->name('creador');
Route::get('/editar/{{id}}',[ComprobanteController::class,'edit'])->name('editor');
Route::get('/eliminar/{{id}}',[ComprobanteController::class,'destroy'])->name('exterminador');
Route::post('/insertar',[ComprobanteController::class,'store'])->name('insertador');

Route::get('/imagenes',[FirebasseController::class,'crear'])->name('imagenget');
Route::get('/ver',[FirebasseController::class,'index'])->name('verimagen');

// Route::post('/insertarimg',[FirebasseController::class,'insertarmodelo'])->name('insertadorimg');
Route::post('/insertarimg',[FirebasseController::class,'insertarcurl'])->name('insertadorimg');


// //////nuevas para put*/
// Route::get('/actualizalo/{COD_EMPRESA}',[HomeControllerfabricante::class,'datosparaactualizar']);
// Route::put('/actualizar',[HomeControllerfabricante::class, 'actualizar'])->name('actualizar'); //cambiar a metodo put
// Route::delete('/eliminarF/{COD_EMPRESA}',[HomeControllerfabricante::class,'eliminar'])->name('eliminarf.eliminarf');


