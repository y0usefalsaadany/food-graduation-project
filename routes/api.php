<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/profile', [AuthController::class, 'userProfile']);
});
Route::controller(CategoryController::class)->group(function () {
    Route::post('/category/add', 'store');
    Route::get('/category/all', 'index');
    Route::get('/category/{id}', 'show');
    Route::get('/category/list', 'list');
});
Route::controller(ProductController::class)->group(function () {
    Route::post('/product/add', 'store');
    Route::get('/product/new', 'new');
    Route::get('/product/all', 'index');
});
