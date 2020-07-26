<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/trucks', 'HomeController@index')->name('home');

Route::get('/trucks/create', 'TrucksController@create');

Route::post('/trucks/create', 'TrucksController@store');

Route::get('/trucks/{truck}/edit', 'TrucksController@edit');

Route::put('/trucks/{truck}/update', 'TrucksController@update');

Route::delete('/trucks/{truck}/delete', 'TrucksController@destroy');


