<?php

Route::group(['prefix' => 'praticien'], function () {
    Route::get('/register/infos', 'praticiens\auth\RegisterController@registerForm')->name('praticien.register.form');
    Route::post('/register/infos/store', 'praticiens\auth\RegisterController@storeForm')->name('praticien.register.store');
    
    Route::get('/register/specialite', 'praticiens\auth\RegisterController@registerForm2')->name('praticien.register.form2');
    Route::post('/register/specialite/store', 'praticiens\auth\RegisterController@storeForm2')->name('praticien.register.store2');

    Route::get('/register/profile', 'praticiens\auth\RegisterController@registerForm3')->name('praticien.register.form3');
    Route::post('/register/profile/store', 'praticiens\auth\RegisterController@storeForm3')->name('praticien.register.store3');

    Route::get('/register/choice', 'praticiens\auth\RegisterController@registerForm4')->name('praticien.register.form4');
    Route::post('/register/profile/choice', 'praticiens\auth\RegisterController@storeForm4')->name('praticien.register.store4');

    Route::get('/register/recap', 'praticiens\auth\RegisterController@registerForm5')->name('praticien.register.form5');
    Route::get('/register/recap/store', 'praticiens\auth\RegisterController@register')->name('praticien.register.store5');

    Route::get('/login', 'praticiens\auth\loginController@showLoginForm')->name('praticien.login.form');
    Route::post('/login', 'praticiens\auth\loginController@login')->name('praticien.login');
    Route::get('/logout', 'praticiens\auth\loginController@logout')->name('praticien.logout');


    Route::view('/register/success', 'praticien.success')->name('success-page');

    Route::group(['middleware' => ['auth:praticien']], function () {
        Route::get('/home', 'praticiens\PraticienController@home')->name('praticien.home');
        Route::get('/friends', 'praticiens\PraticienController@listFriends')->name('friends');
    });
});

