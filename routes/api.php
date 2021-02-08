<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/user/register', [AuthController::class, 'register']);
Route::post('/user/login', [AuthController::class, 'login']);
//Password resets
Route::post('/user/forgot-password', [AuthController::class, 'sendResetPasswordToken']);
Route::post('/user/reset-password-token', [AuthController::class, 'verifyToken']);
Route::post('/user/re-authenticate', [AuthController::class, 'reAuthenticateUser']);

Route::middleware('auth:api')->group(function(){
    Route::resource('/note', NoteController::class);
    Route::post('/user/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'showUser']);
});
