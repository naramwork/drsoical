<?php

use App\Http\Controllers\ContentApiController;
use App\Models\Verse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

Route::post('/sign_up', [RegisteredUserController::class, 'store']);

Route::get('/verses', [ContentApiController::class, 'getVerses']);

Route::get('/updated/{date}', [ContentApiController::class, 'getUpdatedContent']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
