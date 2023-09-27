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

//route che del guest
Route::get('/register', function() {
    return view('auth.register');
})->name ('registrazione');
Route::get('/chi-siamo', [ChiSiamoController::class, 'index']);
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/catalogo', [CatalogoController::class, 'catalogo'])->name('catalogo');
Route::post('/auto_selezionate', [CatalogoController::class, 'filtro'])->name('filtro');


// route dell'utente loggato
Route::resource('/users', UserController::class);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
Route::get('/area-personale', function() {
    return view('profile.edit');
})->name ('area-personale');
Route::get('/prenota-auto', function() {
    return view('prenotaAuto');
})->name ('prenotaAuto');
Route::post('/salva_noleggio', [RentalController::class, 'store'])->name('rental.store');


// route della pagina staff
Route::get('/staff-panel', function () {
    return view('staff');
})->name('staffPanel');
Route::post('/modifica', [CarController::class, 'doubleActionStaffPanel']);
Route::post('/azione', [CarController::class, 'updateOrDelete'])->name('update_or_delete');
Route::put('/staff/{car}', [CarController::class, 'update'])->name('car.update');
Route::delete('/staff/{car}', [CarController::class, 'destroy'])->name('car.destroy');
Route::get('/staff', [CarController::class, 'creaAuto']);
Route::post('/staff', [CarController::class, 'getCarRentalsByMonth'])->name('staff');
Route::post('/salva_auto', [CarController::class, 'store'])->name('car.store');


// route del pannello admin
Route::get('/admin-panel', function () {
    return view('adminPanel');
})->name('adminPanel');
Route::post('/salva_auto_admin', [CarController::class, 'storeByAdmin'])->name('car.store.admin');
Route::post('/update_delete_admin', [CarController::class, 'updateOrDeleteByAdmin'])->name('update_or_delete_admin');
Route::post('/admin-panel', [CarController::class, 'getCarRentalsByMonthByAdmin'])->name('rental_admin');
Route::post('/salva_faq', [FaqController::class, 'store'])->name('faq.store');
Route::get('/', [FaqController::class, 'index'])->name('faq.index');
Route::post('/azione3', [FaqController::class, 'updateOrDeleteFaq'])->name('update_or_delete_faq');
Route::post('/azione2', [UserController::class, 'updateOrDeleteStaffer'])->name('update_or_delete_staffer');
Route::delete('/eliminazione-cliente', [UserController::class, 'destroy'])->name('user.destroy');
Route::post('/creastaff', [UserController::class, 'staffStore'])->name('staff.store');














