<?php

use App\Http\Controllers\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/sanctum/csrf-cookie', function () {
    return csrf_token(); 
});


//PageController
Route::post('/ext/setCategory', [PageController::class, 'setCategory']);
Route::get('/ext/getCategories', [PageController::class, 'getCategories']);

//ItemsController
Route::post('/ext/setItem', [PageController::class, 'setItem']);
Route::get('/ext/getItems', [PageController::class, 'getItems']);

Route::get('/ext/getItem/{search}', [PageController::class, 'getItem']);
Route::get('/ext/getItemById/{id}', [PageController::class, 'getItemById']);
Route::get('/ext/getItemsByCategory/{search}', [PageController::class, 'getItemsByCategory']);
Route::get('/ext/getCategoryByItem/{search}', [PageController::class, 'getCategoryByItem']);


//CartController
Route::get('/ext/getCarts', [CartController::class, 'getCarts']);
Route::get('/ext/getCart/{id}', [CartController::class, 'getCartByUserId']);
Route::get('/ext/getCart/{search}', [CartController::class, 'getCartByUser']);
Route::post('/ext/setCart', [CartController::class, 'addToCart']);
Route::delete('/ext/deleteCartItem/{cartId}', [CartController::class, 'deleteCartItem']);


//UserController
Route::get('/ext/getUsers', [UserController::class, 'getUsers']);
Route::post('/ext/setUser', [UserController::class, 'setUser']);
Route::get('/ext/user/{id}', [UserController::class, 'getUserById']);
//THIS IS FOR TESTING PURPOSES ONLY Route::get('/ext/loginUserg/', [UserController::class, 'loginUser']);
Route::post('/ext/loginUser/', [UserController::class, 'loginUser']);