<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// public routes
Route::get("/products", [\App\Http\Controllers\ProductsController::class, "index"]);
Route::get("/products/{id}", [\App\Http\Controllers\ProductsController::class, "show"]);
Route::get("/products/category/{category_id}", [\App\Http\Controllers\ProductsController::class, "getProductsByCategory"]);
Route::get("/users", [\App\Http\Controllers\UserController::class, 'index']);
Route::post("/users", [\App\Http\Controllers\UserController::class, "store"]);
Route::get("/users/{id}", [\App\Http\Controllers\UserController::class, 'show']);
Route::post("/users/login", [\App\Http\Controllers\AuthController::class, 'login']);
Route::post("/users/logout", [\App\Http\Controllers\AuthController::class, 'logout']);
Route::get("/category", [\App\Http\Controllers\CategoryController::class, "index"]);
Route::get("/category/{id}", [\App\Http\Controllers\CategoryController::class, "show"]);


// protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post("/products", [\App\Http\Controllers\ProductsController::class, "store"]);
    Route::put("/products/{id}", [\App\Http\Controllers\ProductsController::class, "update"]);
    Route::delete("/products/{id}", [\App\Http\Controllers\ProductsController::class, "destroy"]);
    Route::put("/users/{id}", [\App\Http\Controllers\UserController::class, 'update']);
    Route::delete("/users/{id}", [\App\Http\Controllers\UserController::class, 'destroy']);
    Route::post("/category", [\App\Http\Controllers\CategoryController::class, "store"]);
    Route::post('/users/{user_id}/ship-to', [\App\Http\Controllers\ShippingAddressController::class, 'store']);
    Route::get('/users/{user_id}/ship-to', [\App\Http\Controllers\ShippingAddressController::class, 'show']);
    Route::put('/users/{user_id}/ship-to', [\App\Http\Controllers\ShippingAddressController::class, 'update']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
