<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApartmentController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Apartments
Route::group(['prefix' => 'v1/apartments', 'middleware' => 'guest'], function () {
    Route::post('list', [ApartmentController::class, 'list']);
    Route::post('store', [ApartmentController::class, 'store']);
});
