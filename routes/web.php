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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/', 'GuestController@home')->name('home');

Route::get('/login', 'Auth\LoginController@showLogin') ->name('show.login');
Route::post('/login', 'Auth\LoginController@login') ->name('login');

Route::get('/register', 'Auth\RegisterController@showRegister') -> name('show.register');
Route::post('/register', 'Auth\RegisterController@register') -> name('register');

Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');


Route::get('/api/videogames/list', 'ApiController@getVideogames') -> name('api.videogames.list');
Route::get('/api/videogame/delete/{id}', 'ApiController@deleteVideogame') -> name('api.videogame.delete');
