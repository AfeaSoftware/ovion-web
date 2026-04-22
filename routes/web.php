<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/aksesuarlar', function () {
    return view('aksesuarlar');
});

Route::get('/hakkimizda', function () {
    return view('hakkimizda');
});
