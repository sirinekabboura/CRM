<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Client;
use App\Models\Personnel;
use App\Models\User;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;






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

  //tache CURD
  Route::group([
    'prefix' => 'tache'
], function () {
    Route::post('create', [App\Http\Controllers\TacheController::class, 'create']);
    Route::get('index', [App\Http\Controllers\TacheController::class, 'index']);
    Route::post('update/{id}', [App\Http\Controllers\TacheController::class, 'update']);
    Route::delete('destroy/{id}', [App\Http\Controllers\TacheController::class, 'destroy']);
    Route::get('FindTacheById/{id}',[App\Http\Controllers\TacheController::class, 'FindTacheById']);
});

//Sous Tache CRUD
Route::group([
    'prefix' => 'soustache'
], function () {
    Route::post('create', [App\Http\Controllers\SousTacheController::class, 'create']);
    Route::get('index', [App\Http\Controllers\SousTacheController::class, 'index']);
    Route::post('update/{id}', [App\Http\Controllers\SousTacheController::class, 'update']);
    Route::delete('destroy/{id}', [App\Http\Controllers\SousTacheController::class, 'destroy']);
    Route::get('FindSousTacheById/{id}',[App\Http\Controllers\SousTacheController::class, 'FindSousTacheById']);
});
// Project Crud 
Route::group([
    'prefix' => 'project'
], function () {
    Route::post('create', [App\Http\Controllers\ProjectController::class, 'create']);
    Route::get('index', [App\Http\Controllers\ProjectController::class, 'index']);
    Route::post('update/{id}', [App\Http\Controllers\ProjectController::class, 'update']);
    Route::delete('destroy/{id}', [App\Http\Controllers\ProjectController::class, 'destroy']);
});
//Comment Crud 
Route::group([
    'prefix' => 'comment'
], function () {
    Route::post('create', [App\Http\Controllers\CommentController::class, 'create']);
    Route::get('index', [App\Http\Controllers\CommentController::class, 'index']);
    Route::post('update/{id}', [App\Http\Controllers\CommentController::class, 'update']);
    Route::delete('destroy/{id}', [App\Http\Controllers\CommentController::class, 'destroy']);
    Route::get('tache/{id}', [App\Http\Controllers\CommentController::class, 'tache']);


});
////////////////////////////////////////////////////////////////////////////// Client API SERVICE

Route :: get('/Clients/show/{id}', [ClientController :: class, 'show']);
Route :: get('/Clients/index', [ClientController :: class, 'index']);
Route :: post('/Clients', [ClientController :: class, 'store']);
Route :: put('/Clients/{id}', [ClientController :: class, 'update']);
Route :: delete('/Clients/delete/{id}', [ClientController :: class, 'destroy']);

////////////////////////////////////////////////////////////////////////////// Personnel API SERVICE

Route :: get('/Personnels/show/{id}', [PersonnelController :: class, 'show']);
Route :: get('/Personnels/index', [PersonnelController :: class, 'index']);
Route :: post('/Personnels', [PersonnelController :: class, 'store']);
Route :: put('/Personnels/{id}', [PersonnelController :: class, 'update']);
Route :: delete('/Personnels/delete/{id}', [PersonnelController :: class, 'destroy']);


////////////////////////////////////////////////////////////////////////////// User  API SERVICE

Route :: post('/user/register', [RegisterController :: class, 'create']);
Route :: post('/user/loginuser',[LoginController :: class, 'LoginUser']);
Route :: get('/user/index',[LoginController :: class, 'index']);





/////////////////////////////////////////////////////////////////////////////////////////////////

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

