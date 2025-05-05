<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


//api routes
Route::get('/', [ApiController::class, 'index']);

Route::get('/posts/create', [PostController::class, 'create']);

Route::get('/posts/get', [PostController::class, 'getPosts']);




//home routes
Route::get('home', [ApiController::class, 'index']);

//admin routes
Route::get('admin', [ApiController::class, 'index']);

//users routes
Route::get('users', [ApiController::class, 'index']);
