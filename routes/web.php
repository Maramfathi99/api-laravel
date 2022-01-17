<?php

use Illuminate\Support\Facades\Route;
//use  App\Http\Controllers\HomeController;
use  App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return redirect('login');
});
//  Route::get('/home', [HomeController::class,'index']);

// Route::get('login', [UserController::class,'login']);

Route::get('/dashboard', function () {
    return view('admin.home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::prefix("admin")->middleware(['auth'])->group(function () {
    Route::get('user-data', [UserController::class,'userData']);
    Route::get('users-view', [UserController::class,'getUsers']);
      Route::get('/logout', [UserController::class,'logout']);

});
