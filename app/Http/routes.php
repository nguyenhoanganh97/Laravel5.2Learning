<?php
use Illuminate\Support\Facades\Route;

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
Route::get('type/{stickername?}', function ($stickername = 'null') {
    return "sticker tên " . $stickername;
})->where([
    'type' => '[a-z]+',
    'stickername' => '[a-zA-Z]{1,10}'
]);

Route::get('hello-world', function () { //gọi thẳng view
    $quantity = 5;
    return view('hello-world',compact('quantity'));
});

Route::group(['prefix' => 'sticker'], function () {
    Route::get('{stickerType}', function ($stickerType) {
        echo "$stickerType";
    });
});
