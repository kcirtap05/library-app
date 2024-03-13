<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Route::get('/', function () use ($router) {
//     return response()->json(['message' => 'ok']);
// });
// 

Route::group([
    'middleware'=>'web'
], function() {
    Route::namespace('Auth')->group(function() {
        Route::post('/login', 'AuthController@login');
    });
});

Route::post('/register-user', 'UserController@register');
Route::group([
    'middleware'=>'auth:api'
], function() {
    Route::post('/libraries', 'LibraryController@create');
    Route::put('/libraries/{id}', 'LibraryController@update');
    Route::get('/libraries/{id}', 'LibraryController@show');
    Route::get('/libraries', 'LibraryController@grid');
    Route::delete('/libraries/{id}', 'LibraryController@destroy');

    Route::post('/books', 'BookController@create');
    Route::put('/books/{id}', 'BookController@update');
    Route::get('/books/{id}', 'BookController@show');
    Route::get('/books', 'BookController@grid');
    Route::delete('/books/{id}', 'BookController@destroy');

    Route::post('/trackings', 'TrackingController@create');
    Route::put('/trackings/{id}', 'TrackingController@update');
    Route::get('/trackings/{id}', 'TrackingController@show');
    Route::get('/trackings', 'TrackingController@grid');
    Route::delete('/trackings/{id}', 'TrackingController@destroy');
});
