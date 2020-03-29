<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/wines', 'WineController@index')->name('wines');
    Route::get('/contact', 'ContactController@index')->name('contact');
    Route::get('/appointments', 'AppointmentController@index')->name('appointment');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Auth::routes();
});
