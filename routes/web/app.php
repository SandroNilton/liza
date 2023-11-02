<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\ContestController;

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

Route::middleware(['verified', 'auth', 'user-access:user'])->group(function (){
    Route::view('/', 'app.dashboard')->name('dashboard');
    Route::view('profile', 'app.profile')->name('profile');
    Route::resource('contests', ContestController::class);
    Route::get('/participate/{contest}', [ContestController::class, 'participate'])->name('contests.participate');
    Route::get('/participate-status/{contest}', [ContestController::class, 'participateStatus'])->name('contests.participate-status');
});