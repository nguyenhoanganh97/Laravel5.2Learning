<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

/**
 * route truyển tham số
 * $stickername có thể không có
 */
Route::get('sticker/{type}/{stickername?}', function ($type, $stickername = 'null') {
    return "sticker thuộc: " . $type . " tên " . $stickername;
})->where([
    'type' => '[a-z]+',
    'stickername' => '[a-zA-Z]{1,10}'
]);

Route::get('hello-world', function () { 
    return view('hello-world');
});
