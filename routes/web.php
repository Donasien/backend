<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Dashboard.dashboard');
});

Route::get('/Donasi', function () {
    return view('Donations.index');
});

Route::get('/Donatur', function () {
    return view('Donatur.index');
});

Route::get('/DataUser', function () {
    return view('DataUser.index');
});
