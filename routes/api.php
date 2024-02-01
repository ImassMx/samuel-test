<?php

use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::resource('/cotizacion', CotizacionController::class);
    Route::post('logout', [AuthController::class, 'logout']);
});


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'authenticate']);