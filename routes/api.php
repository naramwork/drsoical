<?php

use App\Http\Controllers\AuthAppUser;
use App\Http\Controllers\ContentApiController;
use App\Http\Controllers\MessageController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//public routes
Route::post('/sign_up', [RegisteredUserController::class, 'store']);
Route::get('/verses', [ContentApiController::class, 'getVerses']);

Route::get('/updated/{date?}', [ContentApiController::class, 'getUpdatedContent']);

Route::post('/login_app_user', [AuthAppUser::class, 'login']);
Route::post('/check_user', [AuthAppUser::class, 'check_user_exists']);





//private route
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/update_fcm', [AuthAppUser::class, 'update_fcm']);
    Route::post('/logout_app_user', [AuthAppUser::class, 'logout']);
    Route::post('/send_message', [MessageController::class, 'store']);
});
