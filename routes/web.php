<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('layouts.app');
//});

Route::get('/', [PostController::class, 'index'])
    ->middleware('auth')
    ->name('home');

Auth::routes();
Route::prefix('users')
    ->middleware('auth')
    ->name('users.')
    ->group(function () {
        Route::get('/{id}/follow', [UserController::class, 'follow'])->name('follow');
        Route::get('/{id}/signout', [UserController::class, 'destroy'])->name('logout');
    });

Route::prefix('post')
    ->middleware('auth')
    ->name('post.')
    ->group(function (){
       Route::get('/{id}/retweet', [PostController::class, 'retweet'])->name('retweet');
    });
