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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Admin\VideoController@index')->name('root');
Route::group(['middleware' => ['auth', 'web'], 'prefix' => 'admin/', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::get('/videos/list', 'VideoController@data')->name('videos.list');
    Route::get('/users/list', 'UserController@data')->name('users.list');
    Route::resources([
        'videos' => 'VideoController',
        'users' => 'UserController'
    ]);
});
