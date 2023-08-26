<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('home');
});

Route::get('/chi-siamo', function () {
    return view('ChiSiamo');
});

Route::get('/catalogo-auto', function() {
    return view('catalogo');
});

Route::get('/registrazione', function() {
    return view('registrazione');
});

//Route::get('/registrazione', 'Auth\RegistrationController@showRegistrationForm')->name('registrazione');

//Route::post('/registrazione', 'Auth\RegistrationController@register');

