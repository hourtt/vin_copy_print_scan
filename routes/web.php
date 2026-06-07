<?php

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




// * Guest Routes
Route::get('/', [ProductController::class, 'index'])->name('dashboard');
Route::get('/printers', [ProductController::class, 'printers_index'])->name('collections.printers.index');
Route::get('/toners', [ProductController::class, 'toners_index'])->name('collections.toners.index');
Route::get('/papers', [ProductController::class, 'papers_index'])->name('collections.papers.index');
Route::get('/services', function () {
    return view('services');
})->name('services');

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::post('/orders', [OrdersController::class, 'store'])->name('orders.store');
});


// * Admin Route
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [ProductController::class, 'admin_index'])->name('admin.dashboard');
    Route::resource('/products', ProductController::class)->except(['show']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
