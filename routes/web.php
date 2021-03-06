<?php

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
// Default root to load the entire app
Route::get('/{any}', 'AppController@index')->where('any','.*');

Route::get('/', function () {
    return view('welcome');
});
