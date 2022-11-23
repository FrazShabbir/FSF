<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Member\EnrollmentController;
use App\Http\Controllers\DashboardController;
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



Route::group(['middleware' => ['auth'], 'prefix' => 'member'],function () {

    Route::get('/', [DashboardController::class, 'memberDashboard'])->name('member.dashboard');

    Route::get('enrollments', [EnrollmentController::class, 'index'])->name('enrollment.index');//->middleware(['can:Read enrollments']);
    Route::get('enrollment/start', [EnrollmentController::class, 'create'])->name('enrollment.create');//->middleware(['can:Create enrollments']);
    Route::post('enrollment/create/save', [EnrollmentController::class, 'store'])->name('enrollment.store');//->middleware(['can:Create enrollments']);
    Route::get('enrollment/{id}', [EnrollmentController::class, 'show'])->name('enrollment.show');//->middleware(['can:Read enrollments']);
    Route::get('enrollment/{id}/edit', [EnrollmentController::class, 'edit'])->name('enrollment.edit');//->middleware(['can:Update enrollments']);
    Route::put('enrollment/{id}/update', [EnrollmentController::class, 'update'])->name('enrollment.update');//->middleware(['can:Update enrollments']);


});
require __DIR__.'/auth.php';
