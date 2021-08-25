<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserApiControoler;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/register', [UserApiControoler::class,'register']);
Route::post('/login', [UserApiControoler::class,'login']);


Route::group(['middleware' =>['auth:sanctum']], function() {
    Route::post('/task/add', [TaskController::class,'store']);
    Route::post('/task/status/{id}', [TaskController::class, 'update']);
    Route::post('/logout', [UserApiControoler::class,'logout']);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
