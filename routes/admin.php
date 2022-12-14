<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\GeneralController;
use App\Http\Controllers\Backend\NotificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\AccountController;


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



Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard/admin'],function () {

    Route::get('/', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');

    // Route::resource('users', UserController::class);
    Route::get('users', [UserController::class, 'index'])->name('users.index')->middleware(['can:Read Users']);
    Route::get('users/closed-accounts', [UserController::class, 'closedAccounts'])->name('users.closed.accounts')->middleware(['can:Read Users']);
    Route::get('user/create', [UserController::class, 'create'])->name('users.create')->middleware(['can:Create Users']);
    Route::post('user/create/save', [UserController::class, 'store'])->name('users.store')->middleware(['can:Create Users']);
    Route::get('user/{id}', [UserController::class, 'show'])->name('users.show')->middleware(['can:Read Users']);
    Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware(['can:Update Users']);
    Route::put('user/{id}/update', [UserController::class, 'update'])->name('users.update')->middleware(['can:Update Users']);
    Route::delete('user/{id}', [UserController::class, 'destroy'])->name('users.destroy')->middleware(['can:Delete Users']);

    // Route::resource('roles', RoleController::class);
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index')->middleware(['can:Read Roles']);
    Route::get('role/create', [RoleController::class, 'create'])->name('roles.create')->middleware(['can:Create Roles']);
    Route::post('role/create/save', [RoleController::class, 'store'])->name('roles.store')->middleware(['can:Create Roles']);
    Route::get('role/{id}', [RoleController::class, 'show'])->name('roles.show')->middleware(['can:Read Roles']);
    Route::get('role/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit')->middleware(['can:Update Roles']);
    Route::put('role/{id}/update', [RoleController::class, 'update'])->name('roles.update')->middleware(['can:Update Roles']);
    Route::delete('role/{id}', [RoleController::class, 'destroy'])->name('roles.destroy')->middleware(['can:Delete Roles']);


    Route::get('accounts', [AccountController::class, 'index'])->name('account.index')->middleware(['can:Read Accounts']);
    Route::get('account/create', [AccountController::class, 'create'])->name('account.create')->middleware(['can:Create Accounts']);
    Route::post('account/create/save', [AccountController::class, 'store'])->name('account.store')->middleware(['can:Create Accounts']);
    Route::get('account/{id}', [AccountController::class, 'show'])->name('account.show')->middleware(['can:Read Accounts']);
    Route::get('account/{id}/edit', [AccountController::class, 'edit'])->name('account.edit')->middleware(['can:Update Accounts']);
    Route::put('account/{id}/update', [AccountController::class, 'update'])->name('account.update')->middleware(['can:Update Accounts']);
    Route::delete('account/{id}', [AccountController::class, 'destroy'])->name('account.destroy')->middleware(['can:Delete Accounts']);



    Route::get('reset-password/{user}', [UserController::class, 'reset_password'])->name('users.reset_password');
    Route::get('my-profile', [GeneralController::class, 'myProfile'])->name('site.myProfile');
    Route::get('site-settings', [GeneralController::class, 'siteSettings'])->name('site.siteSettings');
    Route::post('/site-settings-save', [GeneralController::class, 'save_general_settings'])->name('site_settings_save');
    
    Route::get('notifications', [NotificationController::class, 'index'])->name('notification.index');
    Route::get('notification/create', [NotificationController::class, 'create'])->name('notification.create');
    Route::get('notification/{id}', [NotificationController::class, 'show'])->name('notification.show');
    Route::post('notification/save', [NotificationController::class, 'store'])->name('notification.store');

    Route::post('/save-token', [NotificationController::class, 'saveToken'])->name('save-token');
    Route::post('/send-notification', [NotificationController::class, 'sendNotification'])->name('send.notification');

    Route::get('reports/countries', [ReportController::class, 'reportCountries'])->name('report.countries');
    Route::get('reports/communities', [ReportController::class, 'reportCommunities'])->name('report.communities');
    Route::get('reports/provinces', [ReportController::class, 'reportProvinces'])->name('report.provinces');
    Route::get('reports/cities', [ReportController::class, 'reportCities'])->name('report.cities');

});
require __DIR__.'/auth.php';
