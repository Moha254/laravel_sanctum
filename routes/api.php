<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\Taskcontroller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Public Routes
Route::post('/login', [Authcontroller::class, 'login']);
Route::post('/register', [Authcontroller::class, 'register']);


//Protected Routes
Route::group(
    ['middleware' => ['auth:sanctum']], function(){
        Route::resource('/tasks', Taskcontroller::class);
        Route::post('/logout', [Authcontroller::class, 'logout']);
    }
);
