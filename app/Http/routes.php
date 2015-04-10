<?php

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'api'], function () {
    Route::resource('contacts', 'Api\ContactsController', ['except' => ['create', 'edit']]);
    Route::resource('properties', 'Api\PropertiesController', ['except' => ['create', 'edit']]);
    Route::resource('tags', 'Api\TagsController', ['except' => ['create', 'edit']]);
    Route::resource('forms', 'Api\FormsController', ['except' => ['create', 'edit']]);
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
