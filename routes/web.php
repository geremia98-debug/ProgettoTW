<?php

use App\Http\Controllers\AreaPersonaleController;
use App\Http\Controllers\CatalogoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChiSiamoController;
use App\Http\Controllers\HomeController;

Route::get('/registrazione', function() {
    return view('registrazione');
});


Route::get('/modifica-utente', function() {
    return view('modificautente');
});

Route::get('/chi-siamo', [ChiSiamoController::class, 'index']);
Route::get('/area-personale', [AreaPersonaleController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);
Route::get('/catalogo', [CatalogoController::class, 'index']);
Route::post('/salva-dati', 'App\Http\Controllers\DatiController@salva')->name('registrazione');
Route::get('/area-personale/{username}', [UserController::class, 'areaPersonale'])->middleware('auth');
Route::get('/users', [app\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [app\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/users', [app\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [app\Http\Controllers\UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [app\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [app\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [app\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

//Route::resource('/users', app\Http\Controllers\UserController::class);

