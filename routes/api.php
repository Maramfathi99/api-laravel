<?php

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
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
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('login', [UserController::class,'access_token']);
Route::post('refresh_token', [UserController::class,'refresh_token']);

Route::group(['middleware'=>'auth:api'],function (){
    Route::get('user/{user_id?}', [UserController::class,'getUser']);
    Route::post('user', [UserController::class,'postUser']);
    Route::put('user', [UserController::class,'putUser']);
    Route::delete('user', [UserController::class,'deleteUser']);
});
