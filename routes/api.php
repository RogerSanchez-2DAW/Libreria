<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LibroController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('libros', [LibroController::class, 'index']);
Route::post('libros', [LibroController::class, 'store']);
Route::get('libros/{id}', [LibroController::class, 'show']);
Route::put('libros/{id}', [LibroController::class, 'update']);
Route::delete('libros/{id}', [LibroController::class, 'destroy']);

