<?php

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'api'], function () {
    Route::resource('contacts', 'Api\ContactsController', ['except' => ['create', 'edit']]);
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
