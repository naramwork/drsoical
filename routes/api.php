<?php

use App\Http\Controllers\AppInfoController;
use App\Http\Controllers\AuthAppUser;
use App\Http\Controllers\ContentApiController;
use App\Http\Controllers\EditUserController;
use App\Http\Controllers\MarriageController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserMessageController;
use App\Models\UserMessage;
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


//app info links
Route::get('about_us', [AppInfoController::class, 'getAboutUs']);
Route::get('call_us', [AppInfoController::class, 'getCallUs']);
Route::get('app_ad', [AppInfoController::class, 'getAppAd']);
Route::get('marriage_explain', [AppInfoController::class, 'getMarriageExplain']);




//private route
Route::group(['middleware' => ['auth:sanctum']], function () {

    //auth routes
    Route::post('/update_fcm', [AuthAppUser::class, 'update_fcm']);
    Route::get('/refresh_user_fcm/{id}', [AuthAppUser::class, 'refresh_fcm']);
    Route::post('/logout_app_user', [AuthAppUser::class, 'logout']);
    Route::get('/refresh_user/{id}', [AuthAppUser::class, 'refreshUserData']);
    Route::post('/edit_user_data', [EditUserController::class, 'editUserData']);


    //message routes
    Route::post('/send_message', [MessageController::class, 'store']);
    Route::get('/getMessages/{id}', [MessageController::class, 'show']);
    Route::get('/get_message_id/{user_id}/{recipient_id}', [MessageController::class, 'getMessagesById']);
    Route::post('/search', [MessageController::class, 'searchUsers']);


    //Marriage Routes
    Route::get('/get_random/{gender}', [MarriageController::class, 'get_random']);
    Route::post('/send_marriage_request', [MarriageController::class, 'store']);
    Route::get('/get_marriage_requests/{id}', [MarriageController::class, 'show']);
    Route::post('/marriage_request_update', [MarriageController::class, 'update']);


    // Edit User Info
    Route::post('/add_image', [EditUserController::class, 'addimage']);

    Route::post('/user_message', [UserMessageController::class, 'store']);
});
