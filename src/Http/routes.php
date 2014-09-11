<?php

get('/', 'HomeController@home');

// -------------------------------------------------------------------------------------
// API
// -------------------------------------------------------------------------------------
Route::group(['prefix' => 'api', 'namespace' => 'Api'], function()
{
    Route::resource('contacts', 'ContactsController');
    Route::resource('fields', 'FieldsController');
    Route::resource('forms', 'FormsController');
});