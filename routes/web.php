<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'TrucksController@home');

Route::get('/trucks', 'TrucksController@index')->name('home')->middleware('auth');

Route::get('/trucks/create', 'TrucksController@create');

Route::post('/trucks/create', 'TrucksController@store');

Route::get('/trucks/{truck:slug}/edit', 'TrucksController@edit')->name('trucks.edit');

Route::put('/trucks/{truck}/update', 'TrucksController@update');

Route::delete('/trucks/{truck}/delete', 'TrucksController@destroy');

Route::get('/trucks/{truck:slug}/editlocation', 'TrucksController@show')->name('location.edit');

Route::put('/trucks/{truck}/updatelocation', 'TrucksController@updatelocation');


Route::get('/getlocations', 'TrucksController@getlocations');

