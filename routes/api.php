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

Route::post("send", "MailController2@send");

Route::get("users", "AuthController@users");

Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');


Route::post('upload-file', 'FileController2@upload');
Route::post('remove-file', 'FileController2@remove');
