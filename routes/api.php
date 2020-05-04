<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admin')->group(function() {
	Route::post('login', 'AdminController@login');
});

// Users
Route::prefix('users')->group(function() {
	Route::post('/login', 'UsersController@api_login');
	Route::post('/create', 'UsersController@create');
});


// Games
Route::prefix('games')->group(function() {
	Route::get('get', 'GamesController@get');
	Route::get('read', 'GamesController@read');
});

// Events
Route::prefix('events')->group(function() {
	Route::get('get', 'EventsController@get');
});

// Announcements
Route::prefix('announcements')->group(function() {
	Route::get('get', 'AnnouncementsController@get');
});