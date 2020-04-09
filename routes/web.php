<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/appointments', 'AppointmentController@index')->name('appointments');
    Route::post('/appointments', 'AppointmentController@join')->name('appointments.join');
    Route::delete('/appointments/{id}', 'AppointmentController@destroy')->name('appointments.destroy');
});

Route::namespace('Admin')->name('admin.')->group(function () {
    Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth']], function() {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        Route::get('/', 'DashboardController@index');

        Route::resource('users', 'UserController');
        Route::resource('wines', 'WineController');
        Route::resource('winetypes', 'WineTypeController');
        Route::resource('appointments', 'UserAppointmentController');
        Route::resource('tourdates', 'TourDateController');
        Route::resource('winereviews', 'WineReviewController');
    });
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about-us', 'AboutUsController@index')->name('about-us');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::get('/wines', 'WineController@index')->name('wines');
Route::get('/wines/{id}', 'WineController@show')->name('wine');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'HomeController@index');
});
