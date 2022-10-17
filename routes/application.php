<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ApplicationController;



Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'],function () {
    Route::get('applications', [ApplicationController::class, 'index'])->name('application.index')->middleware(['can:Read Applications']);
    Route::get('application/create', [ApplicationController::class, 'create'])->name('application.create')->middleware(['can:Create Applications']);
    Route::post('application/create/save', [ApplicationController::class, 'store'])->name('application.store')->middleware(['can:Create Applications']);
    Route::get('application/{id}', [ApplicationController::class, 'show'])->name('application.show')->middleware(['can:Read Applications']);
    Route::get('application/{id}/edit', [ApplicationController::class, 'edit'])->name('application.edit')->middleware(['can:Update Applications']);
    Route::put('application/{id}/update', [ApplicationController::class, 'update'])->name('application.update')->middleware(['can:Update Applications']);
    Route::delete('application/{id}', [ApplicationController::class, 'destroy'])->name('application.destroy')->middleware(['can:Delete Applications']);

});