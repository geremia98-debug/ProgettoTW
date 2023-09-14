<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function index()
    {
        return view('Catalogo');
    }

    public function catalogo()
{
    $cars = Car::all(); // Ottieni tutte le auto dal database

    return view('catalogo', compact('cars'));
}

//GESTIRE IL FILTRO SULLE DATE CON UN CONTROLLO SULLA TABELLA car_user PER VEDERE SE CI SONO NOLEGGI ATTIVI SU UNA DATA MACCHINA
public function filtro(Request $request)
{
    // Recupera i filtri dall'input dell'utente
    $start_rent = $request->input('start_rent');
    $end_rent = $request->input('end_rent');
    $minPrice = $request->input('min-price');
    $maxPrice = $request->input('max-price');
    $seats = $request->input('seats');

    // Costruisci la query Eloquent per le auto
    $query = Car::query();

    // Applica i filtri se sono stati forniti
    if ($start_rent) {
        $query->where('start_rent', '>=', $start_rent);
    }
    if ($end_rent) {
        $query->where('end_rent', '<=', $end_rent);
    }
    if ($minPrice) {
        $query->where('min-price', '>=', $minPrice);
    }
    if ($maxPrice) {
        $query->where('max-price', '<=', $maxPrice);
    }
    if ($seats) {
        $query->where('seats', $seats);
    }

    // Esegui la query e ottieni i risultati
    $cars = $query->get();

    // Passa i risultati alla vista
    return view('catalogo', compact('cars'));
}


// public function filtro(Request $request)
//     {
//         // Recupera i filtri dall'input dell'utente
//         $brand = $request->input('brand');
//         $seats = $request->input('seats');
//         $price = $request->input('price');

//         // Costruisci la query Eloquent per le auto
//         $query = Car::query();

//         // Applica i filtri se sono stati forniti
//         if ($brand) {
//             $query->where('brand', $brand);
//         }
//         if ($seats) {
//             $query->where('seats', $seats);
//         }
//         if ($price) {
//             $query->where('price', '<=', $price);
//         }

//         // Esegui la query e ottieni i risultati
//         $cars = $query->get();

//         // Passa i risultati alla vista
//         return view('catalogo', compact('cars'));
//     }

}



