<?php

use App\Http\Livewire\ContentPage;
use App\Http\Livewire\DuasPage;
use App\Http\Livewire\HadithPage;
use App\Http\Livewire\VersesPage;
use App\Models\Verse;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
    // $lastRecordDate = Verse::where('updated_at', Verse::max('updated_at'))->first();
    // dd($lastRecordDate);
    //return Verse::all('updated_at')->max('updated_at')->get();

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/verses', VersesPage::class)->name('verses');
    Route::get('/duas', DuasPage::class)->name('duas');
    Route::get('/hadith', HadithPage::class)->name('hadith');
});
