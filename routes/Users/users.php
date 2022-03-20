<?php


use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;

Route::post('signup',[UserController::class,'signup']);
Route::post('login',[UserController::class,'login']);
