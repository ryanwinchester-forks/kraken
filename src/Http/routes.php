<?php

get('/', 'HomeController@home');

Route::resource('forms', 'FormsController');

// -------------------------------------------------------------------------------------
// API
// -------------------------------------------------------------------------------------
Route::group(['prefix' => 'api', 'namespace' => 'Api'], function()
{
    Route::resource('contacts', 'ContactsController');
    Route::resource('fields', 'FieldsController');
    Route::resource('forms', 'FormsController');
});