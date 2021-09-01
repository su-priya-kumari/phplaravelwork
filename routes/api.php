<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserApiController;

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


Route::post('/login',[UserApiController::class,'login']);
Route::post('/register',[UserApiController::class,'register']);

Route::group(['middleware' =>['auth:sanctum']], function() {
    Route::post('/api/task/add', [TaskController::class,'store']);
    Route::post('/api/task/status/{id}', [TaskController::class, 'update']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
