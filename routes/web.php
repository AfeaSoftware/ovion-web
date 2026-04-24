<?php

use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

/* ── Turkish (default) ─────────────────────────────────── */
Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/hakkimizda', fn () => view('pages.about'))->name('about');
Route::get('/destek', fn () => view('pages.destek'))->name('destek');
Route::get('/telefonlar/v11-lite', fn () => view('pages.product-phone-detail'))->name('phones.v11-lite');
Route::get('/saatler/s3-pro', fn () => view('pages.product-watch-detail'))->name('watches.s3-pro');
Route::get('/kulakliklar/h1-pro', fn () => view('pages.product-headphone-detail'))->name('headphones.h1-pro');
Route::get('/aksesuarlar', fn () => view('pages.aksesuarlar'))->name('aksesuarlar');

/* ── English (/en prefix) ──────────────────────────────── */
Route::prefix('en')->name('en.')->group(function () {
    Route::get('/', [HomePageController::class, 'index'])->name('home');
    Route::get('/about', fn () => view('pages.about'))->name('about');
    Route::get('/support', fn () => view('pages.destek'))->name('support');
    Route::get('/phones/v11-lite', fn () => view('pages.product-phone-detail'))->name('phones.v11-lite');
    Route::get('/watches/s3-pro', fn () => view('pages.product-watch-detail'))->name('watches.s3-pro');
    Route::get('/headphones/h1-pro', fn () => view('pages.product-headphone-detail'))->name('headphones.h1-pro');
    Route::get('/accessories', fn () => view('pages.aksesuarlar'))->name('accessories');
});
