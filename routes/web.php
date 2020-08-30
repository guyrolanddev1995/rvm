<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('main-home');
Route::view('rvm', 'welcome')->name('main-home');

require 'patient.php';
require 'praticien.php';
require 'structure.php';
require 'admin.php';