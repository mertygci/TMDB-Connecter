<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\MovieController;


// Movies Routes
Route::prefix('/movies')->name('movies.')->group(function (){
    Route::get('', [MovieController::class, 'index'])->name('index');
    Route::get('/{id}', [MovieController::class, 'show'])->name('show');
});


// Series Routes
Route::prefix('/series')->name('series.')->group(function (){
    Route::get('', [SeriesController::class, 'index'])->name('index');
    Route::get('/{seriesId}', [SeriesController::class, 'show'])->name('show');
});

// Seasons Routes
Route::prefix('/series/{seriesId}/seasons')->name('seasons.')->group(function (){
    Route::get('', [SeasonController::class, 'index'])->name('index');
    Route::get('/{seasonId}', [SeasonController::class, 'show'])->name('show');
});


// Episode Routes
Route::prefix('/series/{seriesId}/seasons/{seasonId}/episodes')->name('episodes.')->group(function (){
    Route::get('', [EpisodeController::class, 'index'])->name('index');
    Route::get('/{episodeId}', [EpisodeController::class, 'show'])->name('show');
});
