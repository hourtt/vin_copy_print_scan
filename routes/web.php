<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




// * Guest Routes
Route::get('/', [ProductController::class, 'index'])->name('dashboard');
Route::get('/product-catalog', [ProductController::class, 'product_catalog_index'])->name('product-catalog.index');
Route::get('/printers', [ProductController::class, 'printers_index'])->name('collections.printers.index');
Route::get('/toners', [ProductController::class, 'toners_index'])->name('collections.toners.index');
Route::get('/inks', [ProductController::class, 'inks_index'])->name('collections.inks.index');
Route::get('/papers', [ProductController::class, 'papers_index'])->name('collections.papers.index');
Route::get('/services', function () {
    return view('services');
})->name('services');

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::post('/orders', [OrdersController::class, 'store'])->name('orders.store');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
});


// * Admin Route
Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [ProductController::class, 'admin_index'])->name('admin.dashboard');
    Route::resource('/products', ProductController::class)->except(['show', 'index']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
