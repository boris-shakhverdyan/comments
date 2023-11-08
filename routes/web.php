<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/login", [AuthController::class, "loginView"]);
Route::post("/login", [AuthController::class, "login"]);
Route::get("/register", [AuthController::class, "registerView"]);
Route::post("/register", [AuthController::class, "register"]);
Route::get("/logout", [AuthController::class, "logout"]);
Route::get("/", [CommentsController::class, "index"]);
Route::post("/", [CommentsController::class, "store"]);