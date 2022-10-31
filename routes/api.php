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
Route::post('/auth/resend-otp', [AuthController::class, 'resendOtp']); // login
Route::post('/auth/forget-password', [AuthController::class, 'forgetPassword']); // login
Route::post('/auth/set-new-password', [AuthController::class, 'setNewPassword']); // login

Route::post('/auth/verify-email', [AuthController::class, 'verfiyEmail']); // login


Route::post('/auth/verify-otp', [AuthController::class, 'verifyOtp']); // login

Route::post('/auth/logout', [AuthController::class, 'logout']); // login


// Route::group( function () {
    // Route::apiResource('application', ApplicationController::class);// application
Route::get('application/create', [ApplicationController::class, 'create']); // application status
Route::get('application/renew/{id}', [ApplicationController::class, 'renew']); // application status


Route::post('application/store', [ApplicationController::class, 'store']); // application status

Route::get('application/{id}/{user}/{token}', [ApplicationController::class, 'show']);
 // application Editing Mode
Route::get('application/{id}/edit', [ApplicationController::class, 'edit']); // application Editing Mode

Route::put('application/{id}/update', [ApplicationController::class, 'update']); // application update Mode



Route::get('myprofile/{id}/{token}', [GeneralController::class, 'myprofile']); // application status
Route::put('myprofile/{id}/update', [GeneralController::class, 'updateProfile']); // application status



Route::post('getprovinces', [ApplicationController::class, 'getProvinces']); // application status
Route::post('getcities', [ApplicationController::class, 'getCities']); // application status


// });
