<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/pets', [App\Http\Controllers\PetsController::class, 'index'])->name('pets');
Route::get('/pets1', [App\Http\Controllers\PetsController::class, 'getLatLng'])->name('LatLng');
//Route::get('/pets', 'PetsController@index');
