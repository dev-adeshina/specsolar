<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Inertia\Inertia;

Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function (Request $request) {
        $portal = $request->user()->portal?->slug;
        return redirect()->route($portal . '_dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/admin.php';
require __DIR__.'/engineer.php';
require __DIR__.'/customers.php';
require __DIR__.'/cashier.php';
require __DIR__.'/customerservice.php';
