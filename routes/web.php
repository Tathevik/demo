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

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
	
	/*articles CRUD*/
	
	Route::get('/articles', 'ArticlesController@index');
	Route::get('/articles/create', 'ArticlesController@create');
	Route::post('/articles', 'ArticlesController@store');
	Route::get('/articles/{article}', 'ArticlesController@show');
	Route::get('/articles/{article}/edit', 'ArticlesController@edit');
	Route::put('/articles/{article}', 'ArticlesController@update');
	Route::delete('/articles/{article}', 'ArticlesController@destroy');

	/*articles CRUD*/

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