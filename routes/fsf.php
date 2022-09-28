<?php

use Illuminate\Support\Facades\Route;

Route::get('page1', function () {
    return view('pages.enrollment');
});

Route::get('page2', function () {
    return view('pages.enrollment_show');
});

Route::get('page3', function () {
    return view('pages.enrollment_edit');
});
