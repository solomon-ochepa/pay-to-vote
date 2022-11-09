<?php

use App\Http\Controllers\Office\EventController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('office')->as('office.')->group(function () {
    Route::get('/dashboard', [SiteController::class, 'dashboard'])->name('dashboard');

    // Events
    // Route::resource('event', EventController::class)->names('event');
});
