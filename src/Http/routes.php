<?php

// =====================================================================================
// UI - front end routes n stuff
// =====================================================================================

Route::get('/', 'HomeController@home');

Route::resource('contacts', 'ContactsController');
Route::resource('fields',   'FieldsController');
Route::resource('forms',    'FormsController');

// =====================================================================================
// API - ajax for the win
// =====================================================================================

Route::api(['version'=> 'v1', 'prefix' => 'api', 'namespace' => 'Api'], function()
{
    Route::resource('contacts', 'ContactsController', ['except' => ['create', 'edit']]);
    Route::resource('fields',   'FieldsController',   ['except' => ['create', 'edit']]);
    Route::resource('forms',    'FormsController',    ['except' => ['create', 'edit']]);
});