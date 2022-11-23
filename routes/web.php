<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ApplicationController;
use App\Http\Controllers\Home\HomeController;

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

Route::get('/', [HomeController::class,'index'])->name('index');







Route::post('get-communities', [ApplicationController::class, 'getCommunities'])->name('get.communities');
Route::post('get-provinces', [ApplicationController::class, 'getProvinces'])->name('get.provinces');
Route::post('get-cities', [ApplicationController::class, 'getCities'])->name('get.cities');
require __DIR__.'/auth.php';
