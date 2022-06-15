<?php

use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\CarpetaController;
use App\Models\Archivo;
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

Route::get('/', [CarpetaController::class, 'index']);

Route::resource('carpetas', CarpetaController::class)->except(['create']);

Route::resource('archivos',ArchivoController::class)->except(['create']);
