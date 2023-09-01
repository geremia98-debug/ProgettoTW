<?php

use App\Http\Controllers\AreaPersonaleController;
use App\Http\Controllers\CatalogoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChiSiamoController;
use App\Http\Controllers\HomeController;

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

// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('/chi-siamo', function () {
//     return view('ChiSiamo');
// });

// Route::get('/catalogo-auto', function() {
//     return view('catalogo');
// });

Route::get('/registrazione', function() {
    return view('registrazione');
});

// Route::get('/area-personale', function() {
//     return view('areaPersonale');
// });

Route::get('/modifica-utente', function() {
    return view('modificautente');
});



Route::get('/chi-siamo', [ChiSiamoController::class, 'index']);
Route::get('/area-personale', [AreaPersonaleController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);
Route::get('/catalogo', [CatalogoController::class, 'index']);

// Route::get('/login', [LoginController::class, 'login']);
// Route::get('/registrazione', [RegistrazioneController::class, 'registrazione']);

Route::post('/salva-dati', 'DatiController@salva')->name('registrazione');



