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



// Admin Tache 
Route::group([
    'prefix' => 'auth/admin'
], function () {

    Route::post('login',[App\Http\Controllers\AuthController::class, 'login']);
    Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
    Route::get('user', [App\Http\Controllers\AuthController::class,'user']);
    Route::get('getuser', [App\Http\Controllers\AuthController::class,'Get_all']);
 
  //tache CURD
  Route::group([
    'prefix' => 'tache'
], function () {
    Route::post('create', [App\Http\Controllers\TacheController::class, 'create']);
    Route::get('index', [App\Http\Controllers\TacheController::class, 'index'])->middleware(["auth:api","scope:index"]);
    Route::post('update/{id}', [App\Http\Controllers\TacheController::class, 'update']);
    Route::post('destroy/{id}', [App\Http\Controllers\TacheController::class, 'destroy']);
    Route::get('tache_comment/{id}', [App\Http\Controllers\TacheController::class, 'tache_comment']);
});

//Sous Tache CRUD
Route::group([
    'prefix' => 'soustache'
], function () {
    Route::post('create', [App\Http\Controllers\SousTacheController::class, 'create']);
    Route::get('index', [App\Http\Controllers\SousTacheController::class, 'index'])->middleware(["scope:index"]);
    Route::post('update/{id}', [App\Http\Controllers\SousTacheController::class, 'update']);
    Route::post('destroy/{id}', [App\Http\Controllers\SousTacheController::class, 'destroy']);
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
    Route::get('index', [App\Http\Controllers\CommentController::class, 'index']);
    Route::post('update/{id}', [App\Http\Controllers\CommentController::class, 'update']);
    Route::post('destroy/{id}', [App\Http\Controllers\CommentController::class, 'destroy']);
    Route::get('tache/{id}', [App\Http\Controllers\CommentController::class, 'tache']);


});

});
// les Tache de la personnel 
Route::group([
    'prefix' => 'auth/user'
], function () {

    Route::post('login',[App\Http\Controllers\AuthController::class, 'login']);
    Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
  
 
  //tache CURD
  Route::group([
    'prefix' => 'tache'
], function () {
   
    Route::get('index', [App\Http\Controllers\TacheController::class, 'index'])->middleware(["auth:api","scope:index"]);
    Route::post('update/{id}', [App\Http\Controllers\TacheController::class, 'update']);

});

//Sous Tache CRUD
Route::group([
    'prefix' => 'soustache'
], function () {
    Route::get('index', [App\Http\Controllers\SousTacheController::class, 'index'])->middleware(["scope:index"]);
    Route::post('update/{id}', [App\Http\Controllers\SousTacheController::class, 'update']);

});
// Project Crud 
Route::group([
    'prefix' => 'project'
], function () {
    Route::get('index', [App\Http\Controllers\ProjectController::class, 'index']);
});
//Comment Crud 
Route::group([
    'prefix' => 'comment'
], function () {
    Route::get('index', [App\Http\Controllers\CommentController::class, 'index']);
});
});
