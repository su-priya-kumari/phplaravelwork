<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserApiController;
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

Route::get('/',[UserApiController::class,'index'])->name('index');
Route::get('/loginpage',[UserApiController::class,'loginpage'])->name('loginpage');
Route::get('/registerpage',[UserApiController::class,'registerpage'])->name('registerpage');
Route::post('/register',[UserApiController::class,'register'])->name('register');
Route::post('/login',[UserApiController::class,'login'])->name('login');


Route::group(['middleware'=>['userAuth']], function () {
    Route::get('/profile',[TaskController::class,'profile'])->name('profile');
    Route::post('/task/add', [TaskController::class,'store']);
    Route::post('/task/status/{id}', [TaskController::class, 'update']);
    Route::get('/logout',[UserApiController::class,'logout'])->name('logout');
});

