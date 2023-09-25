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
use App\Http\Controllers\FaqController;

Route::get('/register', function() {
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

//Route::get('/area-personale/{username}', [UserController::class, 'areaPersonale'])->middleware('auth');
Route::resource('/users', UserController::class);
Route::post('/creastaff', [UserController::class, 'staffStore'])->name('staff.store');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/area-personale', function() {
    return view('profile.edit');
})->name ('area-personale');

Route::get('/staff', [CarController::class, 'creaAuto']);
Route::post('/staff', [CarController::class, 'getCarRentalsByMonth'])->name('staff');


Route::post('/salva_auto', [CarController::class, 'store'])->name('car.store');

Route::get('/prenota-auto', function() {
    return view('prenotaAuto');
})->name ('prenotaAuto');

Route::post('/salva_noleggio', [RentalController::class, 'store'])->name('rental.store');

Route::put('/staff/{car}', [CarController::class, 'update'])->name('car.update');
Route::delete('/staff/{car}', [CarController::class, 'destroy'])->name('car.destroy');

Route::post('/modifica', [CarController::class, 'doubleActionStaffPanel']);
Route::post('/azione', [App\Http\Controllers\CarController::class, 'updateOrDelete'])->name('update_or_delete');
Route::post('/azione2', [App\Http\Controllers\UserController::class, 'updateOrDeleteStaffer'])->name('update_or_delete_staffer');
Route::post('/azione3', [App\Http\Controllers\FaqController::class, 'updateOrDeleteFaq'])->name('update_or_delete_faq');

// Route::get('/admin-panel', function () {
//     return view('adminPanel'); // Assicurati che il nome della vista corrisponda al tuo file .blade.php
// })->name('adminPanel');

Route::get('/admin-panel', function () {
    // Richiama il metodo showRentalCounts
    // (new \App\Http\Controllers\RentalController())->showRentalCounts();  CI SERVE PER ATTIVARE IL METODO OGNI VOLTA CHE APRO LA PAGE?

    // Restituisce la vista 'adminPanel'
    return view('adminPanel');
})->name('adminPanel');


Route::post('/salva_faq', [FaqController::class, 'store'])->name('faq.store');
Route::get('/', [FaqController::class, 'index'])->name('faq.index');















