<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/trucks', 'HomeController@index')->name('home');

Route::get('/trucks/create', 'TrucksController@create');

Route::post('/trucks/create', 'TrucksController@store');

Route::get('/trucks/{truck}/edit', 'TrucksController@edit');

Route::put('/trucks/{truck}/update', 'TrucksController@update');

Route::delete('/trucks/{truck}/delete', 'TrucksController@destroy');

Route::get('/trucks/{truck}/editlocation', 'TrucksController@show');

Route::put('/trucks/{truck}/updatelocation', 'TrucksController@updatelocation');


Route::get('/latlng', 'TrucksController@getlatlng');

Route::get('/latlngWelcome', 'TrucksController@getlatlngWelcome');

