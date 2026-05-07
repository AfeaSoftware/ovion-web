<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DestekController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/* ── Turkish (default) ─────────────────────────────────── */
Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/hakkimizda', [AboutController::class, 'index'])->name('about');
Route::get('/destek', [DestekController::class, 'index'])->name('destek');
Route::get('/telefonlar/{slug}', [ProductController::class, 'phone'])->name('phones.show');
Route::get('/saatler/{slug}', [ProductController::class, 'watch'])->name('watches.show');
Route::get('/kulakliklar/{slug}', [ProductController::class, 'headphone'])->name('headphones.show');

/* ── English (/en prefix) ──────────────────────────────── */
Route::prefix('en')->name('en.')->group(function () {
    Route::get('/', [HomePageController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/support', [DestekController::class, 'index'])->name('support');
    Route::get('/phones/{slug}', [ProductController::class, 'phone'])->name('phones.show');
    Route::get('/watches/{slug}', [ProductController::class, 'watch'])->name('watches.show');
    Route::get('/headphones/{slug}', [ProductController::class, 'headphone'])->name('headphones.show');
});
