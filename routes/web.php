<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//Assing Controllers
use App\Http\Controllers\HomeControlLer;
use App\Http\Controllers\RolControlLer;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function(){
    Route::resource('roles', RolController::class) ;
    Route::resource('usuarios', UserController::class) ;
    Route::resource('blog', BlogController::class) ;
});