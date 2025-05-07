<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/read', [PostController::class, 'read']);
Route::get('/posts/All', [PostController::class, 'all']);
Route::get('/posts/update', [PostController::class, 'update']);
Route::get('/posts/delete', [PostController::class, 'delete']);
