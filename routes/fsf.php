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

Route::get('page4', function () {
    return view('pages.donation');
});

Route::get('page5', function () {
    return view('pages.show_donation');
});

Route::get('page6', function () {
    return view('pages.edit_donation');
});

Route::get('page7', function () {
    return view('pages.applications_by_user');
});

Route::get('page8', function () {
    return view('pages.all_applications');
});
