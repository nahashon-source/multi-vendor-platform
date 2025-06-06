<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Vendor\VendorDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->prefix('vendor')->name('vendor.')->group(function () {
    Route::get('/dashboard', [VendorDashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'role:Vendor'])->prefix('vendor')->name('vendor')->group(function (){
    Route::resource('products', \App\Http\Controllers\Vendor\ProductController::class);
});

Route::prefix('admin')->name('admin.')->middleware(['auth','admin'])->group(function () {
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);

});

Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
