<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EmpController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// posts api routes

Route::post('/create-post',[PostController::class, 'store']);
Route::get('/posts',[PostController::class, 'index']);
Route::get('/post/{id}', [PostController::class, 'show']);
Route::put('/update-post/{id}', [PostController::class, 'update']);
Route::delete('/delete-post/{id}', [PostController::class, 'destroy']);

// employees api routes

Route::post('/create-employee', [EmpController::class, 'store']);
Route::get('/employees', [EmpController::class, 'index']);
Route::get('/employee/{id}', [EmpController::class, 'show']);
Route::put('update-employee/{id}', [EmpController::class, 'update']);
Route::delete('delete-employee/{id}', [EmpController::class, 'destroy']);

//Route::apiResource('posts', PostController::class);
Route::apiResource('employees',EmpController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
