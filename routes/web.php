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

use Spatie\ArrayToXml\ArrayToXml;

// Route::get('/', function () {

//     $array = [
//         'xsd:schema' => [
//             'name' => 'Luke Skywalker',
//             'weapon' => 'Lightsaber'
//         ],
//         'xsd:schema' => [
//             'name' => 'Sauron',
//             'weapon' => 'Evil Eye'
//         ]
//     ];
//
//     $result = ArrayToXml::convert($array);
//     dd($result);
// 	$user = new App\User;
// 	event(new App\Events\Event($user));
//      return new \App\Mail\WelcomeAgain;

/*     $xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><mydoc></mydoc>');*/
//
//     $xml->addAttribute('version', '1.0');
//     $xml->addChild('datetime', date('Y-m-d H:i:s'));
//
//     $person = $xml->addChild('person');
//     $person->addChild('firstname', 'Someone');
//     $person->addChild('secondname', 'Something');
//     $person->addChild('telephone', '123456789');
//     $person->addChild('email', 'me@something.com');
//
//     $address = $person->addchild('address');
//     $address->addchild('homeaddress', 'Andersgatan 2, 432 10 Göteborg');
//     $address->addChild('workaddress', 'Andersgatan 3, 432 10 Göteborg');
//
//     $xml->saveXML('test.xml');
//
//     $response = Response::make($xml->asXML(), 200);
//     $response->header('Content-Type', 'text/xml');
//
//     return $response;
// });

//Route::get('/', 'HomeController@index');
//Route::get('/api/articles', function(){
//    $users = App\Article::with('user')->get();
//    return App\Http\Resources\ArticlesResours::collection($users);
//});
Route::get('/', 'XmlGenerateController@index')->name('login');


Route::group(['middleware' => 'guest'], function () {

    Route::get('/login', 'AuthController@showLogin')->name('login');
    Route::post('/login', 'AuthController@login')->name('login');
    Route::get('/register', 'AuthController@showRegister')->name('register');
    Route::post('/register', 'AuthController@register')->name('register');

    Route::get('/register/verify/{confirmationCode}', 'AuthController@verified');
});

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

	/*ajax controller*/

//    Route::get('ajax', 'AjaxController@index');

    /*Translator */
});


Route::group(['prefix' => '/{locale}'], function () {

    Route::get('/translate', 'TranslatorController@index')->name('translate');

});
