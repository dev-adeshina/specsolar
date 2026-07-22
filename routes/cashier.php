<?php

use App\Http\Controllers\CashierSettings\ProfileController;
use App\Http\Controllers\CashierSettings\SecurityController;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Support\Facades\Route;

Route::prefix('cashier')->middleware(['auth'])->group(function () {
    Route::redirect('settings', '/cashiersettings/profile');

    Route::get('settings/profile', [ProfileController::class, 'cashier_edit'])->name('cashier_profile.edit');
    Route::patch('settings/profile', [ProfileController::class, 'update'])->name('cashier_profile.update');

   Route::middleware(['verified', 'portal:cashier'])->group(function () {
        Route::inertia('dashboard', 'cashier/dashboard')->name('cashier_dashboard');
        Route::delete('settings/profile', [ProfileController::class, 'destroy'])->name('cashier_profile.destroy');

        Route::get('settings/security', [SecurityController::class, 'edit'])
            ->middleware(RequirePassword::class)
            ->name('cashier_security.edit');

        Route::put('settings/password', [SecurityController::class, 'update'])
            ->middleware('throttle:6,1')
            ->name('cashier_user-password.update');

        Route::inertia('settings/appearance', 'cashiersettings/appearance')->name('cashier_appearance.edit');
    });

});

