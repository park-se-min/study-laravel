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

Route::get('/{foo?}', function ($foo='bar') {
    // return view('/test/test1');
    return $foo;
});

/* 
Route::get('/', function () {
    // return view('/test/test1');
    return view('welcome');
});
 */