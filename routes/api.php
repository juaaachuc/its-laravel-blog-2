<?php

use App\Http\Middleware\CanCreatePosts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

Route::post('/login', App\Http\Controllers\LoginController::class . '@login');
Route::post('/logout', App\Http\Controllers\LoginController::class . '@logout')->middleware('auth:sanctum');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::resource
//     ('posts', App\Http\Controllers\PostController::class)
//     ->middleware('auth:sanctum');

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/posts', App\Http\Controllers\PostController::class . '@index');
    Route::post('/posts', App\Http\Controllers\PostController::class . '@store')->middleware(CanCreatePosts::class);
    Route::get('/posts/{id}', App\Http\Controllers\PostController::class . '@show');
    Route::put('/posts/{id}', App\Http\Controllers\PostController::class . '@update');
    Route::delete('/posts/{id}', App\Http\Controllers\PostController::class . '@destroy');
});