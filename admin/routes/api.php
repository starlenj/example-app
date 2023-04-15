<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', 'AuthController@me');
});

Route::group([
    'middleware' => "api"
], function () {
    Route::post("category/store", [CategoryController::class, "store"]);
    Route::get("category/list", [CategoryController::class, "index"]);
    Route::delete("category/{id}", [CategoryController::class, "delete"]);
    Route::post("category/{id}", [CategoryController::class, "update"]);
    Route::get("category/{id}", [CategoryController::class, "get"]);
    //// POST CONTROLLER
    Route::post("post/store", [PostController::class, "store"]);
    Route::get("post/list", [PostController::class, "index"]);
    Route::delete("post/{id}", [PostController::class, "delete"]);
    Route::post("post/{id}", [PostController::class, "update"]);
    Route::get("post/{id}", [PostController::class, "get"]);
});
