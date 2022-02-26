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

Route::get('/', 'OriginalController@index');

Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'user/{id}'], function (){
        Route::post('edit', 'UsersController@edit')->name('user.edit');
        // Route::get('profile', 'UsersController@show')->name('users.profile');
        Route::get('follows', 'UsersController@follows')->name('users.follows');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        Route::get('likes', 'UsersController@likes')->name('users.likes');
    });
    
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::get('post', 'OriginalController@showPostForm')->name('post');
    Route::resource('originalposts', 'OriginalController', ['only' => ['store', 'destroy']]);
});

//ユーザー登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');