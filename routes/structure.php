<?php

Route::group(['prefix' => 'structure'], function () {
    Route::get('/register', 'Structure\Auth\RegisterController@register_form')->name('structure.register.form');
    Route::post('/register', 'Structure\Auth\RegisterController@register')->name('structure.register.store');
    Route::get('/login', 'Structure\Auth\LoginController@showLoginForm')->name('structure.login.form');
    Route::post('/login', 'Structure\Auth\LoginController@login')->name('structure.login.store');
    Route::get('/logout', 'Structure\Auth\LoginController@logout')->name('structure.logout');
    Route::get('/confirmEmail/{token}', 'Structure\Auth\RegisterController@confirmEmail');
    
    Route::group(['middleware' => ['auth:structure']], function () {
        Route::get('/home', 'Structure\StructureController@index')->name('structure.home');

        //structure-praticiens routes//
        Route::group(['prefix' => 'praticiens'], function () {
            Route::get('/index', 'Structure\PraticienController@index')->name('structure.praticiens.index');
            Route::get('/create', 'Structure\PraticienController@create')->name('structure.praticiens.create');
            Route::get('/{praticien}/show', 'Structure\PraticienController@show')->name('structure.praticien.show');
            Route::post('/store', 'Structure\PraticienController@store')->name('structure.praticiens.store');
            Route::get('/edit/{praticien}', 'Structure\PraticienController@edit')->name('structure.praticiens.edit');
            Route::put('/update/{praticien}', 'Structure\PraticienController@update')->name('structure.praticiens.update');
            
            //structure-praticiens-consultations routes//
            Route::get('/{praticien}/planing/create', 'Structure\PraticienController@consultationForm')->name('structure.praticien.consultation.create');
            Route::post('/{praticien}/planing/store', 'Structure\PraticienController@storeConsultation')->name('structure.praticien.consultation.store');
            Route::get('/{praticien}/planing/{consultation}/edit', 'Structure\PraticienController@editConsultation')->name('structure.praticien.consultation.edit');
            Route::put('/{praticien}/planing/{consultation}/update', 'Structure\PraticienController@UpdateConsultation')->name('structure.praticien.consultation.update');
        });

        //Les requetes ajax pour la recuperation des donnes jsons//
        Route::get('/getRecords', 'Structure\StructureController@records');
        Route::get('/consultationsNotification', 'Structure\StructureController@unreadConsultations');

        Route::group(['prefix' => 'consultations'], function () {
            Route::get('/', 'Structure\StructureController@getAllConsultations')->name('structure.consultations');
            Route::get('/{consultation}/show', 'Structure\StructureController@showConsultation')->name('structure.consultation.show');
            Route::get('/{consultation}/confirm', 'Structure\StructureController@confirmConsultation')->name('structure.consultation.confirm');
        });

        Route::group(['prefix' => 'examens'], function () {
            Route::get('/', 'Structure\StructureController@getAllExamens')->name('structure.examens');
            Route::get('/{examen}/show', 'Structure\StructureController@showExamen')->name('structure.examen.show');
            Route::get('/{examen}/confirm', 'Structure\StructureController@confirmExamen')->name('structure.examen.confirm');
        });
    });
});