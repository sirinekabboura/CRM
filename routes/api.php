<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//Test Router


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/v1/test', function () {
    return response()->json(['msg' => "Hello"]);
});
//tache CURD
Route::group([
    'prefix' => 'tache'
], function () {
    Route::post('create', [App\Http\Controllers\TacheController::class, 'create']);
    Route::get('index', [App\Http\Controllers\TacheController::class, 'index']);
    Route::post('update/{id}', [App\Http\Controllers\TacheController::class, 'update']);
    Route::post('destroy/{id}', [App\Http\Controllers\TacheController::class, 'destroy']);
});

//Sous Tache CRUD
Route::group([
    'prefix' => 'soutache'
], function () {
    Route::post('create', [App\Http\Controllers\SouTacheController::class, 'create']);
    Route::get('index', [App\Http\Controllers\SouTacheController::class, 'index']);
    Route::post('update/{id}', [App\Http\Controllers\SouTacheController::class, 'update']);
    Route::post('destroy/{id}', [App\Http\Controllers\SouTacheController::class, 'destroy']);
});
// Project Crud 
Route::group([
    'prefix' => 'project'
], function () {
    Route::post('create', [App\Http\Controllers\ProjectController::class, 'create']);
    Route::get('index', [App\Http\Controllers\ProjectController::class, 'index']);
    Route::post('update/{id}', [App\Http\Controllers\ProjectController::class, 'update']);
    Route::post('destroy/{id}', [App\Http\Controllers\ProjectController::class, 'destroy']);
});
//Comment Crud 
Route::group([
    'prefix' => 'comment'
], function () {
    Route::post('create', [App\Http\Controllers\CommentController::class, 'create']);
    Route::post('index', [App\Http\Controllers\CommentController::class, 'index']);
    Route::post('update/{id}', [App\Http\Controllers\CommentController::class, 'update']);
    Route::post('destroy/{id}', [App\Http\Controllers\CommentController::class, 'destroy']);
});
