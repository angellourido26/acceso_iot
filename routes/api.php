<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/validar-documento/{documento}',[ApiController::class,'validarDocumento']);