<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('test/test1')->with('name', 'Foo');
//     // return view('errors/503');
// });

Route::get('/home', 'WelcomeController@index');

Route::get('/home1', function () {
	return 'home1';
});

Route::get('/home2', function () {
	return 'home2';
});

Route::get('/', function () {
	$items = ['as', 'bbb', 'ccc'];

    return view('welcome2')->with([
		'as1df'=>'aaaa',
		'items'=>$items,
		'itemCount'=>count($items),
	]);
});


