<?php

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

Route::get('/user/create', 'UserController@create');
Route::post('user/store', 'UserController@store');
Route::get('user/login', 'UserController@login')->name('login');
Route::post('user/authenticate', 'UserController@authenticate');
Route::get('/home', 'BlogController@index')->name('home');
Route::get('/show/{id}', 'BlogController@show')->name('show');
Route::get('/create', 'BlogController@create')->middleware('auth');
Route::post('/store', 'BlogController@store');
Route::get('/blog/edit/{id}', 'BlogController@edit')->middleware('auth'); 
Route::patch('/blog/edit/{id}', 'BlogController@update')->middleware('CheckUrl');
Route::post('/logout', 'UserController@logout')->name('logout');
Route::post('/comment/{id}', 'BlogController@comment')->name('comment');
Route::get('/user/profile', 'UserController@profile');
Route::post('/user/create/profile', 'UserController@user_create_profile');

Route::get('/show/{userid}/profile', 'UserController@show')->name('showProfile');
Route::get('/task/create', 'TaskController@create');
Route::post('task/store', 'TaskController@store');
Route::get('task/show', 'TaskController@show');
Route::get('profile/show', 'ProfileController@show');
Route::get('/role', 'RoleController@index');
Route::post('/assign/roles', 'RoleController@store');
Route::get('/assign/access', 'AssignController@index');
Route::post('/assign/store', 'AssignController@store');
Route::get('/product', 'ProductController@index');  
Route::get('/tag', 'TagController@index');   
Route::post('/tag/store', 'TagController@store'); 
Route::get('/tag/show', 'TagController@show');  
Route::get('/friends', 'FriendsController@index'); 
Route::post('/friends/requested', 'FriendsController@store'); 
Route::get('/friends/requested/show', 'FriendsController@show'); 


// Route::get('edit/{id}', 'BlogController@');


