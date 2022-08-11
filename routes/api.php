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

////////////////////////////////////////////////////////////////////////////// Client API SERVICE
Route::middleware(['auth','isAdmin'])->group(function(){
Route :: get('/Clients/show/{id}', [ClientController :: class, 'show']);
Route :: post('/Clients', [ClientController :: class, 'store']);
Route :: put('/Clients/{id}', [ClientController :: class, 'update']);
Route :: delete('/Clients/delete/{id}', [ClientController :: class, 'destroy']);
});
Route :: get('/Clients/index', [ClientController :: class, 'index']);


////////////////////////////////////////////////////////////////////////////// Personnel API SERVICE

Route::middleware(['auth','isAdmin'])->group(function(){
Route :: get('/Personnels/show/{id}', [PersonnelController :: class, 'show']);
Route :: post('/Personnels', [PersonnelController :: class, 'store']);
Route :: put('/Personnels/{id}', [PersonnelController :: class, 'update']);
Route :: delete('/Personnels/delete/{id}', [PersonnelController :: class, 'destroy']);
});
Route :: get('/Personnels/index', [PersonnelController :: class, 'index']);


////////////////////////////////////////////////////////////////////////////// User  API SERVICE


Route :: post('/user/register', [RegisterController :: class, 'create']);
Route :: post('/user/loginuser',[LoginController :: class, 'LoginUser']);


/////////////////////////////////////////////////////////////////////////////////////////////////

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

