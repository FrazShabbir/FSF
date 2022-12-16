<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ApplicationController;
use App\Http\Controllers\Backend\DonationController;


Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'],function () {

    Route::get('applications', [ApplicationController::class, 'index'])->name('application.index')->middleware(['can:Read Applications']);
    Route::get('applications/closed-applications', [ApplicationController::class, 'closedApplications'])->name('applications.closed')->middleware(['can:Read Applications']);
    Route::get('applications/pending', [ApplicationController::class, 'pendingApplications'])->name('applications.pending')->middleware(['can:Read Applications']);
    Route::get('applications/approved', [ApplicationController::class, 'approvedApplications'])->name('applications.approved')->middleware(['can:Read Applications']);
    Route::get('applications/rejected', [ApplicationController::class, 'rejectedApplications'])->name('applications.rejected')->middleware(['can:Read Applications']);

    Route::get('application/create', [ApplicationController::class, 'create'])->name('application.create')->middleware(['can:Create Applications']);
    Route::post('application/create/save', [ApplicationController::class, 'store'])->name('application.store')->middleware(['can:Create Applications']);
    Route::get('application/{id}', [ApplicationController::class, 'show'])->name('application.show')->middleware(['can:Read Applications']);
    Route::get('application/{id}/edit', [ApplicationController::class, 'edit'])->name('application.edit')->middleware(['can:Update Applications']);
    Route::put('application/{id}/update', [ApplicationController::class, 'update'])->name('application.update')->middleware(['can:Update Applications']);
    Route::delete('application/{id}', [ApplicationController::class, 'destroy'])->name('application.destroy')->middleware(['can:Delete Applications']);

    Route::post('application/comment/{id}', [ApplicationController::class, 'commentStore'])->name('application.commentStore')->middleware(['can:Update Applications']);


    Route::get('close-Application/application/{id}/', [ApplicationController::class, 'closeApplication'])->name('user.close.application')->middleware(['can:Update Users']);
    Route::post('close-Application/application/{id}/save', [ApplicationController::class, 'closeApplicationSave'])->name('user.close.application.save')->middleware(['can:Update Users']);
    
    
    Route::get('close-Application/application/{id}/cancel', [ApplicationController::class, 'cancelApplicationClosing'])->name('user.close.application.cancel')->middleware(['can:Update Users']);

    Route::get('donations', [DonationController::class, 'index'])->name('donation.index')->middleware(['can:Read Donations']);
    Route::get('donation/create', [DonationController::class, 'create'])->name('donation.create')->middleware(['can:Create Donations']);
    Route::post('donation/create/save', [DonationController::class, 'store'])->name('donation.store')->middleware(['can:Create Donations']);
    Route::get('donation/{id}', [DonationController::class, 'show'])->name('donation.show')->middleware(['can:Read Donations']);
    Route::get('donation/{id}/edit', [DonationController::class, 'edit'])->name('donation.edit')->middleware(['can:Update Donations']);
    Route::put('donation/{id}/update', [DonationController::class, 'update'])->name('donation.update')->middleware(['can:Update Donations']);
    Route::delete('donation/{id}', [DonationController::class, 'destroy'])->name('donation.destroy')->middleware(['can:Delete Donations']);



});


