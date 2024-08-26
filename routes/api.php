<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/students',[StudentController::class, 'index']);
Route::post('/student/create',[StudentController::class, 'store']);
Route::put('/student/update/{id}',[StudentController::class, 'update']);
Route::delete('/student/delete/{id}',[StudentController::class, 'delete']);

