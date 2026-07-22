<?php

use App\Http\Controllers\CustomerSettings\ProfileController;
use App\Http\Controllers\CustomerSettings\SecurityController;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Support\Facades\Route;

Route::prefix('customers')->middleware(['auth'])->group(function () {
    Route::redirect('settings', '/customerssettings/profile');

    Route::get('settings/profile', [ProfileController::class, 'edit'])->name('customers_profile.edit');
    Route::patch('settings/profile', [ProfileController::class, 'update'])->name('customers_profile.update');

    Route::middleware(['verified', 'portal:customers'])->group(function () {
        Route::inertia('dashboard', 'customers/dashboard')->name('customers_dashboard');
        Route::delete('settings/profile', [ProfileController::class, 'destroy'])->name('customers_profile.destroy');

        Route::get('settings/security', [SecurityController::class, 'edit'])
            ->middleware(RequirePassword::class)
            ->name('customers_security.edit');

        Route::put('settings/password', [SecurityController::class, 'update'])
            ->middleware('throttle:6,1')
            ->name('customers_user-password.update');

        Route::inertia('settings/appearance', 'customerssettings/appearance')->name('customers_appearance.edit');
    });
});


