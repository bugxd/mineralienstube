<?php

/**
*|--------------------------------------------------------------------------
*| Application Routes
*|--------------------------------------------------------------------------
*|
*| Here is where you can register all of the routes for an application.
*| It's a breeze. Simply tell Laravel the URIs it should respond to
*| and give it the Closure to execute when that URI is requested.
*/


/**
*| Normal routes without authentication
*/
Route::get('/', array('uses' => 'PagesController@getWelcome', 'as' => 'welcome'));
Route::get('/home', array('uses' => 'PagesController@getWelcome', 'as' => 'home'));
Route::get('/angebote', array('uses' => 'PagesController@getAngebote', 'as' => 'angebote'));

/**
*| routes with /stones prefix ... mineralienstube.at/stones
*/
Route::group(array('prefix' => '/stones'), function(){
	Route::get('/', array('uses' => 'StonesController@index', 'as' => 'stones-home'));

	Route::get('/stone/{id}', array('uses' => 'StonesController@stoneAlter', 'as' => 'stone-alter'));
	Route::get('/disease/{id}', array('uses' => 'StonesController@diseaseAlter', 'as' => 'disease-alter'));
	Route::get('/body/{id}', array('uses' => 'StonesController@bodyAlter', 'as' => 'body-alter'));
	Route::get('/found/{id}', array('uses' => 'StonesController@foundAlter', 'as' => 'found-alter'));
	//Route::get('/', array('uses' => 'StonesController@', 'as' => ''));

	/**
	*|need to be audmin to enter this routes
	*/
	Route::group(array('before' => 'admin'), function()
	{
		Route::get('/stone/{id}/delete' , array('uses' => 'StonesController@deleteStone', 'as' => 'stones-delete-stone'));
		Route::get('/disease/{id}/delete' , array('uses' => 'StonesController@deleteDisease', 'as' => 'stones-delete-disease'));
		Route::get('/body/{id}/delete' , array('uses' => 'StonesController@deleteBody', 'as' => 'stones-delete-body'));
		Route::get('/found/{id}/delete' , array('uses' => 'StonesController@deleteFound', 'as' => 'stones-delete-found'));

		/**
		*|csrf is needed against cross side scripting
		*/
		Route::group(array('before' => 'csrf'), function()
		{
			Route::post('/stone', array('uses' => 'StonesController@storeStone', 'as' => 'stones-store-stone'));
			Route::post('/disease', array('uses' => 'StonesController@storeDisease', 'as' => 'stones-store-disease'));
			Route::post('/body', array('uses' => 'StonesController@storeBody', 'as' => 'stones-store-body'));
			Route::post('/found', array('uses' => 'StonesController@storeFound', 'as' => 'stones-store-found'));
		});
	});
});


/**
*| normal sides for guests
*/
Route::group(array('before' => 'guest'), function(){
	Route::get('/user/create', array('uses' => 'UserController@getCreate', 'as' => 'getCreate'));
	Route::get('/user/login', array('uses' => 'UserController@getLogin', 'as' => 'getLogin'));
	Route::get('/user/activate/{code}', array('uses' => 'UserController@getActivate', 'as' => 'getActivate'));

		/**
		*|csrf is needed against cross side scripting
		*/
		Route::group(array('before' => 'csrf'), function(){
			//named route
			Route::post('/user/create', array('uses' => 'UserController@postCreate', 'as' => 'postCreate'));
			Route::post('/user/login', array('uses' => 'UserController@postLogin', 'as' => 'postLogin'));
		});
	
});

/**
*| sides that require login
*/
Route::group(array('before' => 'auth'), function()
{
	Route::get('/findYstone', array('uses' => 'PagesController@getFindYStone', 'as' => 'findYstone'));
	Route::get('/user/logout', array('uses' => 'UserController@getLogout', 'as' => 'getLogout'));
	Route::post('/search', array('uses' => 'StonesController@searchStone', 'as' => 'stones-search'));
	Route::get('/reuslts', array('uses' => 'PagesController@getResults', 'as' => 'stones-results'));
	Route::get('/reuslts/{param}', array('uses' =>'StonesController@searchStoneParam', 'as' => 'stones-search-param'));
});





