<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ApplicationController;
use App\Http\Controllers\Home\HomeController;
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

// Route::get('/', function(){
//     if(auth()->check()){
//         return redirect()->route('dashboard');
//     }else{
//         return redirect()->route('login');
//     }
// })->name('index');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/privacy-policies', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/terms-and-conditions', [HomeController::class, 'privacy'])->name('privacy');


Route::group(['middleware' => ['auth']],function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

Route::post('get-communities', [ApplicationController::class, 'getCommunities'])->name('get.communities');
Route::post('get-provinces', [ApplicationController::class, 'getProvinces'])->name('get.provinces');
Route::post('get-cities', [ApplicationController::class, 'getCities'])->name('get.cities');
require __DIR__.'/auth.php';
