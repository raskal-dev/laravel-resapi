<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VoituresController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UserController::class, 'loginUser']);

Route::prefix('/users')->middleware('auth:api')->group(function() {

    Route::post('/create', [UserController::class, 'createUser']);
    Route::get('/list', [UserController::class, 'listUser']);
    Route::get('/logout', [UserController::class, 'logoutUser']);
    Route::put('/update', [UserController::class, 'updateUser']);
    Route::delete('/delete', [UserController::class, 'deleteUser']);

});

Route::prefix('/voitures')->middleware('auth:api')->group(function() {

    Route::get('/list', [VoituresController::class, 'listVoiture']);
    Route::post('/create', [VoituresController::class, 'createVoiture']);

});
