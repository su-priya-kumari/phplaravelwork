<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
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

Route::get('/',[UserAuthController::class,'index'])->name('index');
Route::get('/login',[UserAuthController::class,'login'])->name('login');
Route::get('/register',[UserAuthController::class,'register'])->name('register');
Route::post('/create',[UserAuthController::class,'create'])->name('auth.create');
Route::post('/check',[UserAuthController::class,'check'])->name('auth.check');
Route::get('/logout',[UserAuthController::class,'logout'])->name('logout');

Route::group(['middleware'=>['userAuth']], function () {
    Route::get('/profile',[UserAuthController::class,'profile'])->name('profile');
});

