<?php

use App\Http\Controllers\AreaPersonaleController;
use App\Http\Controllers\CatalogoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChiSiamoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DatiController;
use App\Http\Controllers\RegistrazioneController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

Route::get('/registrazione', function() {
    return view('registrazione');
})->name ('registrazione');


Route::get('/modifica-utente', function() {
    return view('modificautente');
});

Route::get('/chi-siamo', [ChiSiamoController::class, 'index']);
//Route::get('/area-personale', [AreaPersonaleController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);
Route::get('/catalogo', [CatalogoController::class, 'index']);
Route::get('/area-personale/{username}', [UserController::class, 'areaPersonale'])->middleware('auth');
Route::resource('/users', UserController::class);


