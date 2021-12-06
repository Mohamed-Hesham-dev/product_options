<?php

use App\Http\Controllers\OptionController;
use App\Http\Controllers\OptionValueController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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



Route::group(['middleware'=>'auth'],function(){
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::resource('/options',OptionController::class);
    Route::resource('/optionValues',OptionValueController::class);
    Route::resource('/products',ProductController::class);
    Route::resource('/products',ProductController::class);
});
Auth::routes();

