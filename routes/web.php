<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DestekController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

/* ── Turkish (default) ─────────────────────────────────── */
Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/hakkimizda', [AboutController::class, 'index'])->name('about');
Route::get('/destek', [DestekController::class, 'index'])->name('destek');
Route::get('/telefonlar/{slug}', [ProductController::class, 'phone'])->name('phones.show');
Route::get('/saatler/{slug}', [ProductController::class, 'watch'])->name('watches.show');
Route::get('/kulakliklar/{slug}', [ProductController::class, 'headphone'])->name('headphones.show');
Route::get('/aksesuarlar', [AccessoriesController::class, 'index'])->name('aksesuarlar');
Route::get('/arama', [SearchController::class, 'index'])->name('search');
Route::get('/gizlilik', [LegalController::class, 'show'])->defaults('page', 'privacy')->name('legal.privacy');
Route::get('/cerezler', [LegalController::class, 'show'])->defaults('page', 'cookies')->name('legal.cookies');
Route::get('/kullanim-sartlari', [LegalController::class, 'show'])->defaults('page', 'terms')->name('legal.terms');

// Auth
Route::middleware('guest')->group(function (): void {
    Route::get('/kayit', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/kayit', [AuthController::class, 'register']);
    Route::get('/giris', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/giris', [AuthController::class, 'login']);
});
Route::post('/cikis', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Account
Route::middleware('auth')->group(function (): void {
    Route::get('/hesabim', [AccountController::class, 'index'])->name('account');
    Route::patch('/hesabim', [AccountController::class, 'update'])->name('account.update');
});

// Cart
Route::get('/sepet', [CartController::class, 'index'])->name('cart.index');
Route::post('/sepet/ekle/{product:slug}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/sepet/{item}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/sepet/{item}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/sepet/tamamla', [CartController::class, 'submit'])->name('cart.submit');

/* ── English (/en prefix) ──────────────────────────────── */
Route::prefix('en')->name('en.')->group(function (): void {
    Route::get('/', [HomePageController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/support', [DestekController::class, 'index'])->name('support');
    Route::get('/phones/{slug}', [ProductController::class, 'phone'])->name('phones.show');
    Route::get('/watches/{slug}', [ProductController::class, 'watch'])->name('watches.show');
    Route::get('/headphones/{slug}', [ProductController::class, 'headphone'])->name('headphones.show');
    Route::get('/accessories', [AccessoriesController::class, 'index'])->name('accessories');
    Route::get('/search', [SearchController::class, 'index'])->name('search');
    Route::get('/privacy', [LegalController::class, 'show'])->defaults('page', 'privacy')->name('legal.privacy');
    Route::get('/cookies', [LegalController::class, 'show'])->defaults('page', 'cookies')->name('legal.cookies');
    Route::get('/terms', [LegalController::class, 'show'])->defaults('page', 'terms')->name('legal.terms');

    Route::middleware('guest')->group(function (): void {
        Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
        Route::post('/register', [AuthController::class, 'register']);
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

    Route::middleware('auth')->group(function (): void {
        Route::get('/account', [AccountController::class, 'index'])->name('account');
        Route::patch('/account', [AccountController::class, 'update'])->name('account.update');
    });

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product:slug}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/{item}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{item}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/submit', [CartController::class, 'submit'])->name('cart.submit');
});
