<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('landing');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/sponsor/post', function () {
    return view('sponsor.post');
});

Route::get('/sponsor/schedule', function () {
    return view('sponsor.schedule');
});

Route::get('/sponsor/event-page', function () {
    return view('sponsor.event-page');
});

Route::get('/sponsor/personal-information', function () {
    return view('sponsor.personal-information');
});

Route::get('/user/payment', function () {
    return view('User.payment');
});
