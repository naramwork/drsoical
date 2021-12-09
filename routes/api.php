<?php

use App\Http\Controllers\ContentApiController;
use App\Models\Verse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/verses', [ContentApiController::class, 'getVerses']);
Route::get('/previous_verses/{verses}', [ContentApiController::class, 'getPreviousVerses'])->name('previous_verses');

Route::get('/updated/{date?}', [ContentApiController::class, 'getUpdatedContent']);
