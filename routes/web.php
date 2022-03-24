<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BirthdayController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DebitosController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\StickyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
   return view('login.index');
})->name('login');
Route::resource('dashboard', DashboardController::class);
Route::resource('users', UserController::class);
Route::resource('birthdays', BirthdayController::class);
Route::resource('passwords', PasswordController::class);
Route::resource('stickies', StickyController::class);
Route::resource('debitos', DebitosController::class);
Route::post('login', [UserController::class, 'auth'])->name('login.user');
Route::get('logout', [UserController::class, 'logout'])->name('logout.user');

