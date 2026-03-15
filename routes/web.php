<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AmbienteController;
use App\Http\Controllers\Tipo_ElementoController;
use App\Http\Controllers\ElementoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::view('/menu-usuarios', 'usuarios.menu')->name('usuarios.menu');
Route::view('/menu-inventario', 'inventario.menu')->name('inventario.menu');
Route::resource('areas', AreaController::class);
Route::resource('ambientes', AmbienteController::class);
Route::resource('tipo_elemento', Tipo_ElementoController::class);
Route::resource('elementos', ElementoController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('roles', RolController::class);