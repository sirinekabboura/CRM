<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::resource("/client",ClientController::class);
Route::resource("/personnel",PersonnelController::class);


//Admin 
/*
Route::prefix('clients')->middleware(['auth','isAdmin'])->group(function(){
//Route::resource("/",ClientController::class);

});
*/



Route::get('/client', [App\Http\Controllers\ClientController::class, 'index'])->name('client');
Route::get('/personnel', [App\Http\Controllers\PersonnelController::class, 'index'])->name('personnel');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
