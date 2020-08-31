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

Route::group(['prefix' => 'admin'], function() {
    
    Route::get('/dashboard', 'DataController@index')->middleware('role:admin')->name('data.index');
    Route::delete('/delete/{id}', 'DataController@delete_kelompok')->middleware('role:admin');
    Route::get('/detail/{id}', 'DataController@detail')->middleware('role:admin');
    Route::match(['get', 'post'], '/detail/{id}/change_status', 'DataController@change_status')->middleware('role:admin');
    Route::get('/detail_anggota/{id}', 'DataController@detail_anggota')->middleware('role:admin');
    Route::delete('/detail/delete/{id}', 'DataController@delete')->middleware('role:admin');
    
    Route::get('/upload', 'UploadController@upload')->middleware('role:admin')->name('data_upload');
    
    Route::get('/upload_file', 'UploadController@upload_file')->middleware('role:admin');
    Route::post('/upload_file', 'UploadController@send')->name('upload')->middleware('role:admin');
    Route::delete('/upload/{id}', 'UploadController@delete')->name('delete_soal')->middleware('role:admin');
});


//User Route
Route::get('/', 'UserController@index');
Route::get('/download', 'UserController@soal')->middleware('role:user')->name('download');
Route::get('/home', 'UserController@home')->middleware('role:user')->name('home');
Route::post('/add_anggota', 'UserController@store_data_anggota')->middleware('role:user');
Route::match(['get', 'post'], '/home/edit/{id}', 'UserController@data_kelompok_update')->middleware('role:user');
Route::match(['get', 'post'], '/home/update/{id}', 'UserController@kelompok_update')->middleware('role:user');
Route::delete('/home/delete/{id}', 'UserController@delete')->middleware('role:user');
Route::get('/detail/{id}', 'UserController@detail')->middleware('role:user');
Route::get('/upload', 'UserController@upload')->middleware('role:user')->name('upload');
Route::post('/upload_file', 'UserController@upload_file')->name('upload_jawaban')->middleware('role:user');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
