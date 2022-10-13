<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\GeneralController;

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


// Route::group( function () {
    // Route::apiResource('application', ApplicationController::class);// application
Route::get('application/create', [ApplicationController::class, 'create']); // application status
Route::get('application/renew/{id}', [ApplicationController::class, 'renew']); // application status


Route::post('application/store', [ApplicationController::class, 'store']); // application status

Route::get('application/{id}', [ApplicationController::class, 'show']);
 // application Editing Mode
Route::get('application/{id}/edit', [ApplicationController::class, 'edit']); // application Editing Mode

Route::put('application/{id}/update', [ApplicationController::class, 'update']); // application update Mode



Route::get('myprofile/{username}', [GeneralController::class, 'myprofile']); // application status
Route::put('myprofile/{username}/update', [GeneralController::class, 'updateProfile']); // application status



Route::post('getprovinces', [ApplicationController::class, 'getProvinces']); // application status
Route::post('getcities', [ApplicationController::class, 'getCities']); // application status


// });
