<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ApplicationController;
use App\Http\Controllers\Backend\Hierarchy\CountryController;
use App\Http\Controllers\Backend\Hierarchy\CommunityController;
use App\Http\Controllers\Backend\Hierarchy\ProvinceController;
use App\Http\Controllers\Backend\Hierarchy\CityController;



Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'],function () {
    Route::get('countries', [CountryController::class, 'index'])->name('country.index')->middleware(['can:Read Hierarchy']);
    Route::get('country/create', [CountryController::class, 'create'])->name('country.create')->middleware(['can:Create Hierarchy']);
    Route::post('country/create/save', [CountryController::class, 'store'])->name('country.store')->middleware(['can:Create Hierarchy']);
    Route::get('country/{id}', [CountryController::class, 'show'])->name('country.show')->middleware(['can:Read Hierarchy']);
    Route::get('country/{id}/edit', [CountryController::class, 'edit'])->name('country.edit')->middleware(['can:Update Hierarchy']);
    Route::put('country/{id}/update', [CountryController::class, 'update'])->name('country.update')->middleware(['can:Update Hierarchy']);
    Route::delete('country/{id}', [CountryController::class, 'destroy'])->name('country.destroy')->middleware(['can:Delete Hierarchy']);


    Route::get('communities', [CommunityController::class, 'index'])->name('community.index')->middleware(['can:Read Hierarchy']);
    Route::get('community/create', [CommunityController::class, 'create'])->name('community.create')->middleware(['can:Create Hierarchy']);
    Route::post('community/create/save', [CommunityController::class, 'store'])->name('community.store')->middleware(['can:Create Hierarchy']);
    Route::get('community/{id}', [CommunityController::class, 'show'])->name('community.show')->middleware(['can:Read Hierarchy']);
    Route::get('community/{id}/edit', [CommunityController::class, 'edit'])->name('community.edit')->middleware(['can:Update Hierarchy']);
    Route::put('community/{id}/update', [CommunityController::class, 'update'])->name('community.update')->middleware(['can:Update Hierarchy']);
    Route::delete('community/{id}', [CommunityController::class, 'destroy'])->name('community.destroy')->middleware(['can:Delete Hierarchy']);

    Route::get('provinces', [ProvinceController::class, 'index'])->name('province.index')->middleware(['can:Read Hierarchy']);
    Route::get('province/create', [ProvinceController::class, 'create'])->name('province.create')->middleware(['can:Create Hierarchy']);
    Route::post('province/create/save', [ProvinceController::class, 'store'])->name('province.store')->middleware(['can:Create Hierarchy']);
    Route::get('province/{id}', [ProvinceController::class, 'show'])->name('province.show')->middleware(['can:Read Hierarchy']);
    Route::get('province/{id}/edit', [ProvinceController::class, 'edit'])->name('province.edit')->middleware(['can:Update Hierarchy']);
    Route::put('province/{id}/update', [ProvinceController::class, 'update'])->name('province.update')->middleware(['can:Update Hierarchy']);
    Route::delete('province/{id}', [ProvinceController::class, 'destroy'])->name('province.destroy')->middleware(['can:Delete Hierarchy']);

    Route::get('cities', [CityController::class, 'index'])->name('city.index')->middleware(['can:Read Hierarchy']);
    Route::get('city/create', [CityController::class, 'create'])->name('city.create')->middleware(['can:Create Hierarchy']);
    Route::post('city/create/save', [CityController::class, 'store'])->name('city.store')->middleware(['can:Create Hierarchy']);
    Route::get('city/{id}', [CityController::class, 'show'])->name('city.show')->middleware(['can:Read Hierarchy']);
    Route::get('city/{id}/edit', [CityController::class, 'edit'])->name('city.edit')->middleware(['can:Update Hierarchy']);
    Route::put('city/{id}/update', [CityController::class, 'update'])->name('city.update')->middleware(['can:Update Hierarchy']);
    Route::delete('city/{id}', [CityController::class, 'destroy'])->name('city.destroy')->middleware(['can:Delete Hierarchy']);


    


});