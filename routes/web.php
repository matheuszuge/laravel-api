<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;


//api routes
Route::get('/', [ApiController::class, 'index']);

//home routes
Route::get('home', [ApiController::class, 'index']);

//admin routes
Route::get('admin', [ApiController::class, 'index']);

//users routes
Route::get('users', [ApiController::class, 'index']);
