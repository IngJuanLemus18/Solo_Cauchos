<?php

use App\Http\Controllers\AsignarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('customer',CustomerController::class);
Route::resource('supplier',SupplierController::class);
Route::resource('laboratory',LaboratoryController::class);
Route::resource('role',RoleController::class);
Route::resource('permiso',PermisoController::class);
Route::resource('usuario',AsignarController::class);
Route::resource('medicament',MedicamentController::class);


