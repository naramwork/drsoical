<?php

use App\Http\Controllers\AuthAppUser;
use App\Http\Controllers\ContentApiController;
use App\Http\Controllers\MarriageController;
use App\Http\Controllers\MessageController;

use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;






Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//public routes
Route::post('/sign_up', [RegisteredUserController::class, 'store']);
Route::get('/verses', [ContentApiController::class, 'getVerses']);

Route::get('/updated/{date?}', [ContentApiController::class, 'getUpdatedContent']);

Route::post('/login_app_user', [AuthAppUser::class, 'login']);
Route::post('/check_user', [AuthAppUser::class, 'check_user_exists']);
Route::post('/check_user', [AuthAppUser::class, 'check_user_exists']);







//private route
Route::group(['middleware' => ['auth:sanctum']], function () {

    //auth routes
    Route::post('/update_fcm', [AuthAppUser::class, 'update_fcm']);
    Route::get('/refresh_user_fcm/{id}', [AuthAppUser::class, 'refresh_fcm']);
    Route::post('/logout_app_user', [AuthAppUser::class, 'logout']);

    //message routes
    Route::post('/send_message', [MessageController::class, 'store']);
    Route::get('/getMessages/{id}', [MessageController::class, 'show']);
    Route::get('/get_message_id/{user_id}/{recipient_id}', [MessageController::class, 'getMessagesById']);
    Route::post('/search', [MessageController::class, 'searchUsers']);


    //Marriage Routes
    Route::get('/get_random/{gender}', [MarriageController::class, 'get_random']);
    Route::post('/send_marriage_request', [MarriageController::class, 'store']);
    Route::get('/get_marriage_requests/{id}', [MarriageController::class, 'show']);
});
