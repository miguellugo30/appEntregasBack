<?php

use App\Http\Controllers\CatColaboradoresController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaquetesController;
use App\Http\Controllers\PaquetesSalidaController;
use App\Http\Controllers\PaquetesRepartidorController;
use App\Http\Controllers\RepartidorController;
use App\Http\Controllers\VehiculosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::middleware(['auth:sanctum', 'cors'])->group(function () {
    Route::apiResources([
        'colaboradores' => CatColaboradoresController::class,
        'vehiculos' => VehiculosController::class,
        'repartidores' => RepartidorController::class,
        //'paquetes_entrada' => PaquetesSalidaController::class,
        'paquetes' => PaquetesController::class,
        'paquetes_salida' => PaquetesSalidaController::class,
        'paquetes_repartidor' => PaquetesRepartidorController::class,
    ]);
});

Route::get('/paquetes_repartidor/{paquetes_repartidor}', [PaquetesRepartidorController::class, 'index'])->middleware('auth:sanctum');
