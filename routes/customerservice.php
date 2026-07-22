<?php

use App\Http\Controllers\CustomerServiceSettings\ProfileController;
use App\Http\Controllers\CustomerServiceSettings\SecurityController;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Support\Facades\Route;

Route::prefix('customerservice')->middleware(['auth'])->group(function () {
    Route::redirect('settings', '/customerservice/settings/profile');

    Route::get('settings/profile', [ProfileController::class, 'edit'])->name('customerservice_profile.edit');
    Route::patch('settings/profile', [ProfileController::class, 'update'])->name('customerservice_profile.update');

    Route::middleware(['verified', 'portal:customerservice'])->group(function () {
        Route::inertia('dashboard', 'customerservice/dashboard')->name('customerservice_dashboard');
        Route::delete('settings/profile', [ProfileController::class, 'destroy'])->name('customerservice_profile.destroy');

        Route::get('settings/security', [SecurityController::class, 'edit'])
            ->middleware(RequirePassword::class)
            ->name('customerservice_security.edit');

        Route::put('settings/password', [SecurityController::class, 'update'])
            ->middleware('throttle:6,1')
            ->name('customerservice_user-password.update');

        Route::inertia('settings/appearance', 'customerservicesettings/appearance')->name('customerservice_appearance.edit');
    });
});


