<?php

use App\Http\Controllers\AdminSettings\ProfileController;
use App\Http\Controllers\AdminSettings\SecurityController;
use App\Http\Controllers\Staff\Actions\Catalog\AttributeController;
use App\Http\Controllers\Staff\Actions\Catalog\AttributeGroupController;
use App\Http\Controllers\Staff\Actions\Catalog\BrandController;
use App\Http\Controllers\Staff\DepartmentController;
use App\Http\Controllers\Staff\CatalogController;
use App\Http\Controllers\Staff\Actions\Catalog\CategoryController;
use App\Http\Controllers\Staff\Actions\Catalog\ProductController;
use App\Http\Controllers\Staff\Actions\Catalog\ProductTypeAttributeController;
use App\Http\Controllers\Staff\Actions\Catalog\ProductTypeController;
use App\Http\Controllers\Staff\Actions\Catalog\ProductVariantController;
use App\Http\Controllers\Staff\Actions\Catalog\TagController;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\portal;




Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::redirect('admin_settings', '/adminsettings/profile');

    Route::get('settings/profile', [ProfileController::class, 'admin_edit'])->name('admin_profile.edit');
    Route::patch('settings/profile', [ProfileController::class, 'admin_update'])->name('admin_profile.update');

    Route::middleware(['verified', 'portal:admin'])->group(function () {
        Route::inertia('dashboard', 'admin/dashboard')->name('admin_dashboard');
        Route::get('staff', [DepartmentController::class, 'index'])->name('staff.index');
        Route::post('staff/create', [DepartmentController::class, 'store'])->name('staff.store');
        Route::delete('settings/profile', [ProfileController::class, 'admin_destroy'])->name('admin_profile.destroy');
        Route::get('settings/security', [SecurityController::class, 'admin_edit'])->middleware(RequirePassword::class)->name('admin_security.edit');
        Route::put('settings/password', [SecurityController::class, 'admin_update'])->middleware('throttle:6,1')->name('admin_user-password.update');
        Route::inertia('settings/appearance', 'adminsettings/appearance')->name('admin_appearance.edit');

        Route::prefix('catalog')->group(function() {
           
            Route::get('categories', [CatalogController::class, 'categories'])->name('catalog.categories');

            Route::get('brands', [CatalogController::class, 'brands'])->name('catalog.brands');
            Route::get('product-type', [CatalogController::class, 'productType'])->name('catalog.product-type');
            Route::get('attribute-group', [CatalogController::class, 'attributeGroup'])->name('catalog.attribute-group');
            Route::get('attribute', [CatalogController::class, 'attribute'])->name('catalog.attribute');
            Route::get('product-type-attribute', [CatalogController::class, 'productTypeAttribute'])->name('catalog.product-type-attribute');
            Route::get('tag', [CatalogController::class, 'tag'])->name('catalog.tag');
            Route::get('warehouse', [CatalogController::class, 'warehouse'])->name('catalog.warehouse');
            Route::get('product', [CatalogController::class, 'product'])->name('catalog.product');
            Route::get('product-variant', [CatalogController::class, 'productVariant'])->name('catalog.product-variant');

                Route::prefix('categories')->group(function () {
                    Route::post('create', [CategoryController::class, 'store'])->name('categories.create');
                });

                Route::prefix('brands')->group(function () {
                    Route::post('create', [BrandController::class, 'store'])->name('brands.create');
                });

                Route::prefix('products')->group(function () {
                    Route::post('create', [ProductController::class, 'store'])->name('products.create');
                });

                Route::prefix('attribute-group')->group(function () {
                    Route::post('create', [AttributeGroupController::class, 'store'])->name('attribute-group.create');
                });

                Route::prefix('attribute')->group(function () {
                    Route::post('create', [AttributeController::class, 'store'])->name('attribute.create');
                });

                Route::prefix('product-type')->group(function () {
                    Route::post('create', [ProductTypeController::class, 'store'])->name('product-type.create');
                });

                Route::prefix('product-type-attribute')->group(function () {
                    Route::post('create', [ProductTypeAttributeController::class, 'store'])->name('product-type-attribute.create');
                });

                Route::prefix('product-variant')->group(function () {
                    Route::post('create', [ProductVariantController::class, 'store'])->name('product-variant.create');
                });

                Route::prefix('tag')->group(function () {
                    Route::post('create', [TagController::class, 'store'])->name('tag.create');
                });
        });
    });
});


