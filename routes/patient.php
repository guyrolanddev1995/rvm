<?php

Route::group(['prefix' => 'patient'], function () {
    Route::get('/register', 'Patient\auth\RegisterController@register_form')->name('patient.register.form');
    Route::post('/register', 'Patient\auth\RegisterController@register')->name('patient.register.store');
    Route::get('/login', 'Patient\auth\LoginController@showLoginForm')->name('patient.login.form');
    Route::post('/login', 'Patient\auth\LoginController@login')->name('patient.login.store');
    Route::get('/logout', 'Patient\auth\LoginController@logout')->name('patient.logout');
    Route::get('/confirmEmail/{token}', 'Patient\auth\RegisterController@confirmEmail');

    Route::group(['middleware' => ['auth:patient']], function () {
        Route::get('/home', 'Patient\PatientController@index')->name('patient.home');
        Route::group(['prefix' => 'consultation'], function () {
            Route::get('/rdv/form', 'Patient\ConsultationController@stepForm1')->name('rdv_consultation');
            Route::post('/rdv/form', 'Patient\ConsultationController@store')->name('rdv_consltation_store');
            Route::get('/rdv/form2', 'Patient\ConsultationController@stepForm2')->name('rdv_consultation2');
            Route::post('/rdv/form2/store', 'Patient\ConsultationController@storeStep2')->name('rdv_consltation_store2');
            Route::get('/rdv/form3', 'Patient\ConsultationController@stepForm3')->name('rdv_consultation3');
            Route::post('/rdv/form3/store', 'Patient\ConsultationController@storeStep3')->name('rdv_consltation_store3');
            Route::get('/rdv/recap', 'Patient\ConsultationController@recap')->name('rdv_recap');
            Route::get('/rdv/recap/store', 'Patient\ConsultationController@storeRecap')->name('rdv.store');
            Route::get('/rdv/cancel', 'Patient\ConsultationController@cancel')->name('rdv.cancel');
        });

        Route::group(['prefix' => 'examen'], function () {
            Route::get('/rdv/form', 'Patient\ExamenController@stepForm1')->name('rdv_examen');
            Route::post('/rdv/form', 'Patient\ExamenController@store')->name('rdv_examen_store');
            Route::get('/rdv/form2', 'Patient\ExamenController@stepForm2')->name('rdv_examen2');
            Route::post('/rdv/form2/store', 'Patient\ExamenController@storeStep2')->name('rdv_examen2_store');
            Route::get('/rdv/form3', 'Patient\ExamenController@stepForm3')->name('rdv_examen3');
            Route::post('/rdv/form3/store', 'Patient\ExamenController@storeStep3')->name('rdv_examen3_store');
            Route::get('/rdv/recap', 'Patient\ExamenController@recap')->name('examen_racap');
            Route::get('/rdv/recap/store', 'Patient\ExamenController@storeRecap')->name('examen.store');
            // Route::get('/rdv/cancel', 'Patient\ExamenController@cancel')->name('examen.cancel');
        });
    });
});