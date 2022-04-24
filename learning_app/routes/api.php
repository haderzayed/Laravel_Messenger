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

// Auth Routes
Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
Route::post('/logout', 'AuthController@logout')->middleware('token.auth');
Route::get('/user-profile', 'AuthController@userProfile')->middleware('token.auth');

//general request

Route::post('/uploadImage', 'uploadImageController@saveImage');


// forget password
Route::post('forgot-password', 'AuthController@forgot_password');
Route::post('check-forgot-password-code', 'AuthController@checkForgetPasswordCode');
Route::post('set-new-password', 'AuthController@setNewPassword');
