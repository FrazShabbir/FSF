<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\DonationController;

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
Route::get('application/myapplication', [ApplicationController::class, 'index']); // application status

Route::get('application/create', [ApplicationController::class, 'create']); // application status
Route::get('application/renew/', [ApplicationController::class, 'renew']); // application status
Route::post('application/store', [ApplicationController::class, 'store']); // application status
Route::get('application/{id}/{user}/{token}', [ApplicationController::class, 'show']);
// application Editing Mode
Route::get('application/edit', [ApplicationController::class, 'edit']); // application Editing Mode
Route::post('application/update', [ApplicationController::class, 'update']); // application update Mode

Route::get('get_passport/info/{id}/{user}/{token}', [ApplicationController::class, 'passportInfo']);


Route::get('myprofile/{id}/{token}', [GeneralController::class, 'myprofile']); // application status
Route::post('myprofile/{id}/update', [GeneralController::class, 'updateProfile']); // application status

Route::get('donation/create', [DonationController::class, 'create']); // application status
Route::get('donations/all', [DonationController::class, 'allDonation']); // application status
Route::post('donation/store', [DonationController::class, 'store']); // application status



Route::post('getprovinces', [ApplicationController::class, 'getProvinces']); // application status
Route::post('getcities', [ApplicationController::class, 'getCities']); // application status
Route::post('getCommunities', [ApplicationController::class, 'getCommunities']); // application status

Route::get('nearest-offices/all', [GeneralController::class, 'nearOffice']); // application status
Route::get('terms-and-conditions', [GeneralController::class, 'terms']); // application status
Route::get('about', [GeneralController::class, 'about']); // application status
Route::get('privacy', [GeneralController::class, 'privacy']); // application status
Route::get('terms-and-conditions/download', [GeneralController::class, 'termsdownload']); // application status
Route::get('manual/download', [GeneralController::class, 'manualdownload']); // application status
Route::get('notifications', [GeneralController::class, 'notifications']); // application status
Route::get('notification/{id}', [GeneralController::class, 'notificationsDetail']); // application status

Route::get('check/notifications', [GeneralController::class, 'notificationsCheck']); // application status

// });
