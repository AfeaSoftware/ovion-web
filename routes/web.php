<?php

use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomePageController::class, 'index'])->name('home');

Route::get('/hakkimizda', function () {
    return view('pages.about');
});

Route::get('/destek', function () {
    return view('pages.destek');
});

Route::get('/telefonlar/v11-lite', function () {
    return view('pages.product-phone-detail');
});

Route::get('/saatler/s3-pro', function () {
    return view('pages.product-watch-detail');
});

Route::get('/kulakliklar/h1-pro', function () {
    return view('pages.product-headphone-detail');
});
