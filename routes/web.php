<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    if (Auth::check()) {
        return Inertia\Inertia::render('Dashboard');
    }
    else {
        return view('auth.login');
    }
})->name('CheckIfLoggedIn');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/user/wachtlijst', [\App\Http\Controllers\WachtlijstController::class, 'role'])->name('wachtlijst')->middleware('auth');
Route::post('/user/wachtlijst', [\App\Http\Controllers\WachtlijstController::class, 'search'])->middleware('auth')->name('search');

Route::get('/user/view/{id}', [\App\Http\Controllers\WachtlijstController::class, 'view'])->middleware('auth')->name('UserInfo');
Route::post('/user/view/{id}', [\App\Http\Controllers\WachtlijstController::class, 'update'])->middleware('auth');

Route::delete('/user/delete', [\App\Http\Controllers\WachtlijstController::class, 'delete'])->middleware('auth')->name('DeleteUser');

Route::post('/user/changeStatus', [\App\Http\Controllers\WachtlijstController::class, 'changeStatus'])->middleware('auth');

