<?php

use App\Http\Controllers\CatColaboradoresController;
use App\Http\Controllers\LoginController;
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
Route::post('/login', [LoginController::class, 'store']);

Route::apiResources([
    'colaboradores' => CatColaboradoresController::class,
    'vehiculos' => VehiculosController::class,
]);
//Route::apiResource('login', LoginController::class)->middleware(['auth:sanctum']);
