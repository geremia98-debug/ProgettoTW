<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use Illuminate\Http\Request;
use App\Http\Controllers\DatiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ChiSiamoController;
use App\Http\Controllers\RegistrazioneController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/registrazione', function() {
    return view('auth.register');
})->name ('registrazione');


Route::get('/modifica-utente', function() {
    return view('modificautente');
});
// ->middleware('superuser')
Route::get('/chi-siamo', [ChiSiamoController::class, 'index']);
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/catalogo', [CatalogoController::class, 'catalogo'])->name('catalogo');
Route::post('/auto_selezionate', [CatalogoController::class, 'filtro'])->name('filtro');

Route::get('/area-personale/{username}', [UserController::class, 'areaPersonale'])->middleware('auth');
Route::resource('/users', UserController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/inserisci_auto', [CarController::class, 'creaAuto']);

Route::post('/salva_auto', [CarController::class, 'store'])->name('car.store');

Route::get('/prenota-auto', function() {
    return view('prenotaAuto');
})->name ('prenotaAuto');

// Route::post('/form', function(Request $request){
//     dd($request);
// })->name('form');




