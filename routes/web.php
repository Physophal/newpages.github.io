<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::prefix('admin')->group(function(){
    //Route::get('dashboard', [\App\Http\Controllers\admin\DashboardController::class, 'index']);
//});

Route::prefix('admin')->middleware(([ 'auth','isAdmin']))->group(function(){
    Route::get('dashboard', [App\Http\Controllers\admin\DashboardController::class, 'index']);

    //Category Group of Routes
    Route::controller(App\Http\Controllers\admin\CatagoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
        //Route::get('/category', 'register');
    });

    //Route::get('/category/register', [App\Http\Controllers\Auth\RegisterController::class, 'create']);

    Route::get('/category/register', function () {
        return view('auth.register');
    });
});


