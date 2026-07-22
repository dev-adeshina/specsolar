<?php

use App\Http\Controllers\EngineerSettings\ProfileController;
use App\Http\Controllers\EngineerSettings\SecurityController;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Support\Facades\Route;

Route::prefix('engineer')->middleware(['auth'])->group(function () {
    Route::redirect('settings', '/engineer/settings/profile');

    Route::get('settings/profile', [ProfileController::class, 'edit'])->name('engineer_profile.edit');
    Route::patch('settings/profile', [ProfileController::class, 'update'])->name('engineer_profile.update');

    Route::middleware(['verified', 'portal:engineer'])->group(function () {
        Route::inertia('dashboard', 'engineer/dashboard')->name('engineer_dashboard');
        Route::delete('settings/profile', [ProfileController::class, 'destroy'])->name('engineer_profile.destroy');

        Route::get('settings/security', [SecurityController::class, 'edit'])
            ->middleware(RequirePassword::class)
            ->name('engineer_security.edit');

        Route::put('settings/password', [SecurityController::class, 'update'])
            ->middleware('throttle:6,1')
            ->name('engineer_user-password.update');

        Route::inertia('settings/appearance', 'engineersettings/appearance')->name('engineer_appearance.edit');
    });

});


