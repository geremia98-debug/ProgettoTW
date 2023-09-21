<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use Illuminate\Http\Request;
use App\Http\Controllers\DatiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ChiSiamoController;
use App\Http\Controllers\RegistrazioneController;
use App\Http\Controllers\RentalController;

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
Route::post('/inserisci_auto', [CarController::class, 'getCarRentalsByMonth'])->name('staff');


Route::post('/salva_auto', [CarController::class, 'store'])->name('car.store');

Route::get('/prenota-auto', function() {
    return view('prenotaAuto');
})->name ('prenotaAuto');

Route::post('/salva_noleggio', [RentalController::class, 'store'])->name('rental.store');

Route::put('/inserisci_auto/{car}', [CarController::class, 'update'])->name('car.update');
Route::delete('/inserisci_auto/{car}', [CarController::class, 'destroy'])->name('car.destroy');

Route::post('/modifica', [CarController::class, 'doubleActionStaffPanel']);
Route::post('/azione', [App\Http\Controllers\CarController::class, 'updateOrDelete'])->name('update_or_delete');















