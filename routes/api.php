<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ApplicationController;
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

Route::post('/auth/register', [AuthController::class, 'createUser']); // register
Route::post('/auth/login', [AuthController::class, 'loginUser']); // login


Route::middleware('auth:sanctum')->group( function () {
    Route::apiResource('application', ApplicationController::class);// application
    Route::get('application/{id}/status', [ApplicationController::class, 'status']); // application status
    
});
