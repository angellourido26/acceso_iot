<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AmbienteController;
use App\Http\Controllers\Tipo_ElementoController;
use App\Http\Controllers\ElementoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\LogAccesoController;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([\App\Http\Middleware\AuthUsuario::class])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::view('/menu-usuarios', 'usuarios.menu')->name('usuarios.menu');
    Route::view('/menu-inventario', 'inventario.menu')->name('inventario.menu');

    Route::middleware('rol:1')->group(function () {
        Route::resource('usuarios', UsuarioController::class);
        Route::resource('roles', RolController::class);
    });

    Route::middleware('rol:1,2,3')->group(function () {
        Route::resource('areas', AreaController::class);
        Route::resource('ambientes', AmbienteController::class);
    });

    Route::middleware('rol:1,2')->group(function () {
        Route::resource('tipo_elemento', Tipo_ElementoController::class);
        Route::resource('elementos', ElementoController::class);
    });

    Route::resource('logs', LogAccesoController::class)->only(['index','show']);

});