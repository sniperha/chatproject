<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MessageController;
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
Route::post('/sendmessage',[MessageController::class,'Message']);
Route::post('/deletemessage/{id}',[MessageController::class,'DeleteMessage']);
Route::post('/editmessage/{id}',[MessageController::class,'EditMessage']);
Route::get('/getallmessage',[MessageController::class,'getallmessage']);

