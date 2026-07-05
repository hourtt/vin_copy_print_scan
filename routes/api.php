<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\PrinterController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('api.categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('api.categories.show');

// Products (filterable via ?category_id, ?category, ?brand_id, ?search, ?sort, ?per_page)
Route::get('/products', [ProductController::class, 'index'])->name('api.products.index');

// Printer model reference / compatibility lookup
Route::get('/printers', [PrinterController::class, 'index'])->name('api.printers.index');
Route::get('/printers/{printer}', [PrinterController::class, 'show'])->name('api.printers.show');