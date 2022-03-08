<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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

Route::post('/AddUser',[UserController::class,'AddUser']);
Route::post('/deleteuser/{id}',[UserController::class,'deleteuser']);
Route::get('/getalluser',[UserController::class,'getalluser']);
Route::post('/login',[UserController::class,'login']);
Route::get('/hello',function (){return "hello";});