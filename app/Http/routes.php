<?php

Route::get('/', 'HomeController@index');

Route::resource('forms', 'FormsController', ['only' => ['index', 'show', 'create' , 'edit']]);
Route::resource('properties', 'PropertiesController', ['only' => ['index', 'show', 'create' , 'edit']]);

Route::group(['prefix' => 'api'], function () {
    Route::resource('contacts', 'Api\ContactsController', ['except' => ['create', 'edit']]);
    Route::resource('properties', 'Api\PropertiesController', ['except' => ['create', 'edit']]);
    Route::resource('property-types', 'Api\PropertyTypesController', ['except' => ['create', 'edit']]);
    Route::resource('tags', 'Api\TagsController', ['except' => ['create', 'edit']]);
    Route::resource('forms', 'Api\FormsController', ['except' => ['create', 'edit']]);
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
