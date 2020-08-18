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

Route::get('/', function () {
    return view('welcome');
});

Route::get('key', function() {
    return \Illuminate\Support\Str::random(32);
});

Route::resource('admin', 'AdminController')->middleware('auth');
Route::resource('artikel', 'ArtikelController')->middleware('auth');
Route::resource('maping', 'MapingController')->middleware('auth');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');