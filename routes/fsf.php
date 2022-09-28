<?php

use Illuminate\Support\Facades\Route;

Route::get('page1', function () {
    return view('pages.enrollment');
});
