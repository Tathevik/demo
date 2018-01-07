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

// Route::get('/', function () {
// 	$user = new App\User;
// 	event(new App\Events\Event($user));
//     // return new \App\Mail\WelcomeAgain;
// });

Route::get('/', 'HomeController@index');

Route::get('/login', 'AuthController@showLogin')->name('login');
Route::post('/login', 'AuthController@login')->name('login');
Route::get('/register', 'AuthController@showRegister')->name('register');
Route::post('/register', 'AuthController@register')->name('register');
Route::post('/logout', 'AuthController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {

	/*articles CRUD*/
	
	Route::get('/articles', 'ArticlesController@index');
	Route::get('/articles/create', 'ArticlesController@create');
	Route::post('/articles', 'ArticlesController@store');
	Route::get('/articles/{article}', 'ArticlesController@show');
	Route::get('/articles/{article}/edit', 'ArticlesController@edit');
	Route::put('/articles/{article}', 'ArticlesController@update');
	Route::delete('/articles/{article}', 'ArticlesController@destroy');

	/*categories CRUD*/

	Route::get('/categories', 'CategoriesController@index');
	Route::get('/categories/create', 'CategoriesController@create');
	Route::post('/categories', 'CategoriesController@store');
	Route::get('/categories/{category}', 'CategoriesController@show');
	Route::get('/categories/{category}/edit', 'CategoriesController@edit');
	Route::put('/categories/{category}', 'CategoriesController@update');
	Route::delete('/categories/{category}', 'CategoriesController@destroy');

	Route::get('/categories/{category}/articles', 'CategoriesController@categoryArticles');

	Route::post('/articles/{article}/comments', 'CommentsController@store');
});