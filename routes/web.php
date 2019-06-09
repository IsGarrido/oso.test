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

Route::group(['middleware' => ['checkRole']], function () {

    Route::get('/', function () {
        return view('index');
    });

    Route::resource('places', 'PlaceController');
    Route::resource('comment', 'CommentController');
    Route::resource('user', 'UserController');
    Route::resource('book', 'BookingController');

    Route::patch('user/toggleblock/{id}', 'UserController@toggleblock');

    Auth::routes();
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::get('/home', 'HomeController@index')->name('home');

});



