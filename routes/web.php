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

// Guest
Route::get('/', 'PagesController@index');
Route::get('/register', 'PagesController@register');
Route::post('/register', 'UsersController@register');
Route::get('/login', 'UsersController@login');
Route::post('/login', 'UsersController@login_user');

// Users
Route::get('/users/dashboard', 'UsersController@dashboard');
Route::get('/announcements', 'UsersController@announcements');
Route::get('/games', 'UsersController@games');
Route::get('/events', 'UsersController@events');
Route::get('/users/logout', 'UsersController@logout');

// Admin
Route::get('/admin', 'PagesController@login');
Route::post('/admin/login', 'AdminController@login');
Route::get('/admin/dashboard', 'AdminController@dashboard');
Route::get('/admin/announcements', 'AdminController@announcements');
Route::post('/admin/announcements/create', 'AnnouncementsController@admin_create');
Route::post('/admin/announcements/delete', 'AnnouncementsController@admin_delete');
Route::get('/admin/games', 'AdminController@games');
Route::post('/admin/games/create', 'GamesController@admin_create');
Route::post('/admin/games/delete', 'GamesController@admin_delete');
Route::get('/admin/events', 'AdminController@events');
Route::post('/admin/events/delete', 'EventsController@admin_delete_event');
Route::post('/admin/events/create', 'EventsController@admin_create_event');
Route::post('/admin/event/type/create', 'EventsController@admin_create_event_type');