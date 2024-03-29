<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

///GETTING USER USING API
Route::get('users',[UserController::class,'index']);
///

///CREATE USER USING API
Route::post('users',[UserController::class,'upload']);
///

///EDIT USER USING API
Route::put('users/edit/{id}',[UserController::class,'edit']);
///

///DELETE USER USING API
Route::delete('users/edit/{id}',[UserController::class,'delete']);
///

///DELETE USER USING API
Route::patch('users/edit/{id}',[UserController::class,'patch']);
///


