<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\GeneralController;
use App\Http\Controllers\Backend\NotificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\AccountController;
use App\Http\Controllers\Backend\OfficeController;


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

    Route::post('account/topup/{id}/save', [AccountController::class, 'addAmount'])->name('account.topup')->middleware(['can:Update Accounts']);
    Route::post('account/expense/{id}/save', [AccountController::class, 'payAmount'])->name('account.expense')->middleware(['can:Update Accounts']);
    
    

    Route::get('offices', [OfficeController::class, 'index'])->name('office.index')->middleware(['can:Read Office']);
    Route::get('office/create', [OfficeController::class, 'create'])->name('office.create')->middleware(['can:Create Office']);
    Route::post('office/create/save', [OfficeController::class, 'store'])->name('office.store')->middleware(['can:Create Office']);
    Route::get('office/{id}', [OfficeController::class, 'show'])->name('office.show')->middleware(['can:Read Office']);
    Route::get('office/{id}/edit', [OfficeController::class, 'edit'])->name('office.edit')->middleware(['can:Update Office']);
    Route::put('office/{id}/update', [OfficeController::class, 'update'])->name('office.update')->middleware(['can:Update Office']);
    Route::delete('office/{id}', [OfficeController::class, 'destroy'])->name('office.destroy')->middleware(['can:Delete Office']);




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
    Route::get('reports/applications', [ReportController::class, 'applicationReports'])->name('report.application');
    Route::get('reports/users', [ReportController::class, 'userReport'])->name('report.users');


    Route::get('ledger', [ReportController::class, 'ledger'])->name('report.ledger');

    // Route::get('master-report/generator', [ReportController::class, 'masterReport'])->name('report.generator');
    // Route::post('request/master-report/generator', [ReportController::class, 'masterReportRequest'])->name('master.report.request');

    Route::get('ledger/account/{id}', [ReportController::class, 'ledgerByAccount'])->name('report.ledgerByAccount');
    
    Route::get('three-months', [ReportController::class, 'ledgerOfThreeMonths'])->name('report.ThreeMledger');
    Route::get('ledger/six-months', [ReportController::class, 'ledgerOfSixMonths'])->name('report.SixMledger');
    Route::get('ledgertewelve-months', [ReportController::class, 'ledgerOfTewelveMonths'])->name('report.TewelveMledger');    



});
require __DIR__.'/auth.php';
