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

Route::group(['middleware' => ['checkBlocked']], function () {

    Route::get('/', function () {
        return view('index');
    });

    // Resources
    Route::resource('places', 'PlaceController');
    Route::resource('comment', 'CommentController');
    Route::resource('user', 'UserController');
    Route::resource('book', 'BookingController');

    // Extra
    Route::patch('user/toggleblock/{id}', 'UserController@toggleblock');
    Route::get("book/place/{id}", "BookingController@showplace");

    Route::get("api/placetypes", "PlaceController@types");
    Route::get("api/place/{query?}", "PlaceController@get");

    // Auth
    Auth::routes();
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::get('/home', 'HomeController@index')->name('home');

});



