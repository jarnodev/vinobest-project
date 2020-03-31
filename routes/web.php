<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/appointments', 'AppointmentController@index')->name('appointment');
});

Route::namespace('Admin')->name('admin.')->group(function () {
    Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth']], function() {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        Route::get('/', 'DashboardController@index');

        Route::resource('users', 'UserController');
        Route::resource('wines', 'WineController');
    });
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about-us', 'AboutUsController@index')->name('about-us');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::get('/wines', 'WineController@index')->name('wines');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'HomeController@index');
});
