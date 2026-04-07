<?php

use App\Http\Controllers\Backend\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PageController;

Route::get('/', function () {
    return view('frontend.index');
})->name('index');

Route::get('/photo-detail', function () {
    return view('frontend.photo-detail');
})->name('photo-detail');

Route::get('/video-detail', function () {
    return view('frontend.video-detail');
})->name('video-detail');

Route::get('/videos', function () {
    return view('frontend.videos');
})->name('videos');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/registration', function () {
    return view('auth.registration');
})->name('registration');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::get('/dashboard', [PageController::class, 'index'])->name('index');
});

