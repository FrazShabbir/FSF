<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ApplicationController;
use App\Http\Controllers\Backend\Hierarchy\CountryController;
use App\Http\Controllers\Backend\Hierarchy\CommunityController;
use App\Http\Controllers\Backend\Hierarchy\ProvinceController;
use App\Http\Controllers\Backend\Hierarchy\CityController;



Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'],function () {
    Route::get('countries', [CountryController::class, 'index'])->name('country.index');
    Route::get('country/create', [CountryController::class, 'create'])->name('country.create');
    Route::post('country/create/save', [CountryController::class, 'store'])->name('country.store');
    Route::get('country/{id}', [CountryController::class, 'show'])->name('country.show');
    Route::get('country/{id}/edit', [CountryController::class, 'edit'])->name('country.edit');
    Route::put('country/{id}/update', [CountryController::class, 'update'])->name('country.update');
    Route::delete('country/{id}', [CountryController::class, 'destroy'])->name('country.destroy');


    Route::get('communities', [CommunityController::class, 'index'])->name('community.index');
    Route::get('community/create', [CommunityController::class, 'create'])->name('community.create');
    Route::post('community/create/save', [CommunityController::class, 'store'])->name('community.store');
    Route::get('community/{id}', [CommunityController::class, 'show'])->name('community.show');
    Route::get('community/{id}/edit', [CommunityController::class, 'edit'])->name('community.edit');
    Route::put('community/{id}/update', [CommunityController::class, 'update'])->name('community.update');
    Route::delete('community/{id}', [CommunityController::class, 'destroy'])->name('community.destroy');

    Route::get('provinces', [ProvinceController::class, 'index'])->name('province.index');
    Route::get('province/create', [ProvinceController::class, 'create'])->name('province.create');
    Route::post('province/create/save', [ProvinceController::class, 'store'])->name('province.store');
    Route::get('province/{id}', [ProvinceController::class, 'show'])->name('province.show');
    Route::get('province/{id}/edit', [ProvinceController::class, 'edit'])->name('province.edit');
    Route::put('province/{id}/update', [ProvinceController::class, 'update'])->name('province.update');
    Route::delete('province/{id}', [ProvinceController::class, 'destroy'])->name('province.destroy');

    Route::get('cities', [CityController::class, 'index'])->name('city.index');
    Route::get('city/create', [CityController::class, 'create'])->name('city.create');
    Route::post('city/create/save', [CityController::class, 'store'])->name('city.store');
    Route::get('city/{id}', [CityController::class, 'show'])->name('city.show');
    Route::get('city/{id}/edit', [CityController::class, 'edit'])->name('city.edit');
    Route::put('city/{id}/update', [CityController::class, 'update'])->name('city.update');
    Route::delete('city/{id}', [CityController::class, 'destroy'])->name('city.destroy');




});