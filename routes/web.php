<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/home', 'HomeController@index')->name('home');

require 'praticien.php';