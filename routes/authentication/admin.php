<?php

use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminSalesController;
use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\Admin\AdminVoucherController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminShippingController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// * Admin Routes
Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', [ProductController::class, 'admin_index'])->name('admin.dashboard');

    // Products — full resource (replaces old except(['show','index']))
    Route::resource('/products', AdminProductController::class)
        ->names([
            'index'   => 'admin.products.index',
            'create'  => 'admin.products.create',
            'store'   => 'admin.products.store',
            'show'    => 'admin.products.show',
            'edit'    => 'admin.products.edit',
            'update'  => 'admin.products.update',
            'destroy' => 'admin.products.destroy',
        ]);
    Route::patch('/products/{product}/toggle-featured', [AdminProductController::class, 'toggleFeatured'])
        ->name('admin.products.toggle-featured');
    Route::post('/products/{product}/images/{image}/set-primary', [AdminProductController::class, 'setImagePrimary'])
        ->name('admin.products.images.set-primary');
    Route::delete('/products/{product}/images/{image}', [AdminProductController::class, 'destroyImage'])
        ->name('admin.products.images.destroy');

    // Categories
    Route::resource('/categories', AdminCategoryController::class)
        ->except(['show'])
        ->names([
            'index'   => 'admin.categories.index',
            'create'  => 'admin.categories.create',
            'store'   => 'admin.categories.store',
            'edit'    => 'admin.categories.edit',
            'update'  => 'admin.categories.update',
            'destroy' => 'admin.categories.destroy',
        ]);
    Route::get('/categories/{category}/products', [AdminCategoryController::class, 'products'])
        ->name('admin.categories.products');

    // Sales / Orders
    Route::get('/sales', [AdminSalesController::class, 'index'])->name('admin.sales.index');
    Route::get('/sales/{order}', [AdminSalesController::class, 'show'])->name('admin.sales.show');
    Route::patch('/sales/{order}/status', [AdminSalesController::class, 'updateStatus'])->name('admin.sales.update-status');
    Route::patch('/sales/{order}/tracking', [AdminSalesController::class, 'updateTracking'])->name('admin.sales.update-tracking');

    // Vouchers
    Route::resource('/vouchers', AdminVoucherController::class)
        ->except(['show'])
        ->names([
            'index'   => 'admin.vouchers.index',
            'create'  => 'admin.vouchers.create',
            'store'   => 'admin.vouchers.store',
            'edit'    => 'admin.vouchers.edit',
            'update'  => 'admin.vouchers.update',
            'destroy' => 'admin.vouchers.destroy',
        ]);
    Route::patch('/vouchers/{voucher}/toggle', [AdminVoucherController::class, 'toggle'])
        ->name('admin.vouchers.toggle');

    // Customers
    Route::get('/customers', [AdminCustomerController::class, 'index'])->name('admin.customers.index');
    Route::get('/customers/{user}', [AdminCustomerController::class, 'show'])->name('admin.customers.show');
    Route::patch('/customers/{user}/toggle-status', [AdminCustomerController::class, 'toggleStatus'])
        ->name('admin.customers.toggle-status');

    // Settings
    Route::get('/settings', [AdminSettingsController::class, 'index'])->name('admin.settings.index');
    Route::patch('/settings/shop', [AdminSettingsController::class, 'updateShop'])->name('admin.settings.update-shop');
    Route::patch('/settings/admin', [AdminSettingsController::class, 'updateAdmin'])->name('admin.settings.update-admin');
    Route::patch('/settings/password', [AdminSettingsController::class, 'updatePassword'])->name('admin.settings.update-password');

    // Shipping Methods (full CRUD within settings)
    Route::resource('/settings/shipping', AdminShippingController::class)
        ->except(['show'])
        ->names([
            'index'   => 'admin.settings.shipping.index',
            'create'  => 'admin.settings.shipping.create',
            'store'   => 'admin.settings.shipping.store',
            'edit'    => 'admin.settings.shipping.edit',
            'update'  => 'admin.settings.shipping.update',
            'destroy' => 'admin.settings.shipping.destroy',
        ]);
    Route::patch('/settings/shipping/{shippingMethod}/toggle', [AdminShippingController::class, 'toggle'])
        ->name('admin.settings.shipping.toggle');
});