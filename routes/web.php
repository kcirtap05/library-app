<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () use ($router) {
    return response()->json(['message' => 'ok']);
});

// Route::post('/first-libraries', function () {
//     echo 1;
//     return;
// });

// Route::post('/first-libraries', 'FirstLibraryController@create');
