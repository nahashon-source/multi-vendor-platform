<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('./admin/dashboard', function (){
    return 'Admin Area';
})->middleware('admin');

Route::get('vendor/dashbaord', function(){
    return 'Vendor Area';
})->middleware('vendor');
