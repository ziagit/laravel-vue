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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("send", "MailController@send");

//Route::get("users", "AuthController@users");

//Route::post('login', 'AuthController@login');
//Route::post('logout', 'AuthController@logout');


//Route::post('upload-file', 'FileUpload3@upload');
//Route::post('remove-file', 'FileUpload3@remove');



// Route::post('login', 'AuthController@login');

// Route::post('register', 'AuthController@register');

// Route::group(['middleware' => 'auth:api'], function () {

//     Route::get('me', 'AuthController@me');

//     Route::post('logout', 'AuthController@logout');

//     Route::post('message','NotificationController@newMessage');

// });