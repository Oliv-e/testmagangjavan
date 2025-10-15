<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', [UserController::class , 'index']);
Route::post('users', [UserController::class, 'store']);
Route::get('users/{id}', [UserController::class, 'view']);
Route::match(['put','patch'],'/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'delete']);