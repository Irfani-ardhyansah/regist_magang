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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/user', 'ApiDataController@users');
// Route::get('/kelompok', 'ApiDataController@kelompok');
// Route::get('/data_kelompok', 'ApiDataController@data_kelompok');

Route::post('login','Api\AuthController@login');
Route::post('register','Api\AuthController@register');
Route::get('logout', 'Api\AuthController@logout');

Route::post('file', 'Api\UploadController@upload');

Route::get('data','Api\DataController@kelompok');
Route::get('data_anggota', 'Api\DataController@data_anggota');