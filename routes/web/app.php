<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\ContestController;
use App\Http\Controllers\App\ParticipantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['verified', 'auth', 'user-access:user'])->name('app.')->group(function (){
    Route::view('/', 'app.dashboard')->name('dashboard');
    Route::view('profile', 'app.profile')->name('profile');
    Route::resource('contests', ContestController::class);
    Route::resource('participants', ParticipantController::class);
});