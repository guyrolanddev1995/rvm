<?php

Route::group(['prefix' => 'admin'], function () {
    Route::view('dashbord', 'admin.home')->name('admin.dashbord');
});