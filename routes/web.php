<?php

use Illuminate\Support\Facades\Route;

//App Route
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TeamsController;
use Laravel\Jetstream\Jetstream;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    //Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    //Users
    Route::prefix('users')->group(function() {
        Route::get('/', [UsersController::class, 'index'])->name('users.index');
        Route::get('/json', [UsersController::class, 'json'])->name('users.json');
    });

    //Teams
    Route::prefix('teams')->group(function() {
        Route::get('/', [TeamsController::class, 'index'])->name('teams.index');
    });
    Route::get('/teams/json', [TeamsController::class, 'json'])->name('teams.json');
});
