<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RequirementController;
use App\Http\Controllers\Admin\ContestController;
use App\Http\Controllers\Admin\ParticipantController;

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

Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->name('admin.')->group(function (){
    Route::view('/', 'admin.dashboard')->name('dashboard');
    Route::view('profile', 'admin.profile')->name('profile');
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('requirements', RequirementController::class);
    Route::resource('contests', ContestController::class);
    Route::resource('participants', ParticipantController::class);
    Route::get('/participants/{contest}/group', [ParticipantController::class, 'group'])->name('participants.group');
});