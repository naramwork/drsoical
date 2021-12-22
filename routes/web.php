<?php

use App\Http\Livewire\AdminsControl;
use App\Http\Livewire\CustomersControl;
use App\Http\Livewire\DuasPage;
use App\Http\Livewire\HadithPage;
use App\Http\Livewire\MarriageRequestPage;
use App\Http\Livewire\MessagePage;
use App\Http\Livewire\UserProfilePage;
use App\Http\Livewire\VersesPage;
use App\Http\Livewire\Visitor;
use App\Http\Middleware\CheckStatus;
use App\Models\AdminProfile;
use App\Models\Message;
use App\Models\User;
use App\Models\Verse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;


Route::get('/', function () {
    // return User::where('profile_type', AdminProfile::class)->join('admin_profiles', 'users.profile_id', '=', 'admin_profiles.id')->get();
    if (Auth::user()) {
        // Auth::user()->assignRole('superAdmin');
        var_dump(Auth::user()->profile->fire_base_token);
    }
    // $message = Message::where('sender_id', 2)->get()->groupBy('recipient_id');
    // return $message;
    // return Message::all();
    // return view('welcome');
    //return Message::all()->random(5)->values();
    // $lastRecordDate = Verse::where('updated_at', Verse::max('updated_at'))->first();
    // dd($lastRecordDate);
    //return Verse::all('updated_at')->max('updated_at')->get();
    return redirect(route('dashboard'));
});


//to make a link to storage folder
Route::get('/generate', function () {
    $targetFolder = '/home/naramapps/public_html/laravel/storage/app/public';
    $linkFolder = '/home/naramapps/public_html/storage';
    symlink($targetFolder, $linkFolder);
    echo 'Symlink completed';
})->name('generate');

Route::get('/visitor', Visitor::class)->name('visitor');



Route::group(['middleware' => ['auth:sanctum', 'verified', CheckStatus::class]], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/verses', VersesPage::class)->name('verses');

    Route::get('/duas', DuasPage::class)->name('duas');

    Route::get('/hadith', HadithPage::class)->name('hadith');

    Route::group(['middleware' => ['can:control']], function () {
        Route::get('/admin/admins-control', AdminsControl::class)->name('admins-control');

        Route::get('/admin/customers-control', CustomersControl::class)->name('customers-control');
    });


    Route::group(['middleware' => ['can:observe']], function () {
        Route::get('/user/{id}', UserProfilePage::class)->name('user-profile-page');

        Route::get('/messages', MessagePage::class)->name('messages');
        Route::get('/marriage_request', MarriageRequestPage::class)->name('marriage-request');
    });
});
