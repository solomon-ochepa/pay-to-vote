<?php

use App\Http\Controllers\ContestantController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])->name('home');

// Events
Route::resource('event', EventController::class)->except(['index'])->names('event');
Route::get('events', [EventController::class, 'index'])->name('event.index');
Route::get('event', function () {
    return redirect()->route('event.index');
});

Route::prefix('event')->as('event.')->group(function () {
    // Event -> Contestants
    Route::resource('{event}/contestant', ContestantController::class)->middleware(['auth'])->except(['index', 'show'])->names('contestant');
    Route::get('{event}/contestant/{contestant}', [ContestantController::class, 'show'])->name('contestant.show');
    Route::get('{event}/contestants', [ContestantController::class, 'index'])->name('contestant.index');
    Route::get('{event}/contestant', function () {
        return redirect()->route('contestant.index');
    });
});

// Votes
Route::resource('vote', VoteController::class)->except(['index'])->names('vote');
Route::get('votes', [VoteController::class, 'index'])->name('vote.index');
Route::get('vote', function () {
    return redirect()->route('vote.index');
});
