<?php

Route::get('/praticien/register', 'praticiens\auth\RegisterController@register_form');
Route::post('/praticien/regsiter', 'praticiens\auth\RegisterController@register');

Route::post('/praticien/uploadImage', 'praticiens\auth\RegisterController@uploadOneFile');

Route::get('/praticien/login', 'praticiens\auth\loginController@showLoginForm');
Route::post('/praticien/login', 'praticiens\auth\loginController@login')->name('praticien-login');
Route::get('/praticien/logout', 'praticiens\auth\loginController@logout')->name('praticien-logout');


Route::view('/praticien/register/success', 'praticien.success')->name('success-page');
Route::get('/praticien/verifyAccount/{token}', 'praticiens\auth\RegisterController@verifyAccount');


Route::group(['middleware' => ['auth:praticien']], function () {
    Route::view('/praticien/home', 'praticien.home')->name('praticien-home');
});