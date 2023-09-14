<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
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


public function filtro(Request $request)
{
    $startRent = $request->input('start_rent');
    $endRent = $request->input('end_rent');
    $minPrice = $request->input('min-price');
    $maxPrice = $request->input('max-price');
    $seats = $request->input('seats');

    // Costruisci la query Eloquent per le auto
    $Carquery = Car::query();


    // Applica i filtri sulla tabella cars agli attributi price e seats se sono stati forniti

    $Carquery->when($minPrice, function ($query, $minPrice) {
        return $query->where('price', '>=', $minPrice);
    });

    $Carquery->when($maxPrice, function ($query, $maxPrice) {
        return $query->where('price', '<=', $maxPrice);
    });

    $Carquery->when($seats, function ($query, $seats) {
        return $query->where('seats', $seats);
    });

    // Esegui la query e ottieni i risultati
    $cars = $Carquery->get();


        $rentedCarIds = Rental::query()
        ->where(function ($query) use ($startRent, $endRent) {
            $query->where('start_rent', '<=', $endRent)
                ->where('end_rent', '>=', $startRent);
        })
        ->pluck('car_id');

        // Ottieni tutti i car che non sono nell'array di car_id
        $cars = Car::query()
        ->whereNotIn('id', $rentedCarIds)
        ->get();

        // Passa i risultati alla vista
        return view('catalogo', compact('cars'));
    

    // Se non ci sono risultati per le auto, restituisci una vista vuota o un messaggio di nessun risultato
    return view('home');
}
}






    // if ($cars->count() > 0) {

    //     $rentalQuery = Rental::query();

    //     // Applica i filtri per la tabella car_user
    //     $rentalQuery->when($startRent, function ($query, $startRent) {
    //         return $query->where('start_rent', '>=', $startRent);
    //     });

    //     $rentalQuery->when($endRent, function ($query, $endRent) {
    //         return $query->where('end_rent', '<=', $endRent);
    //     });

    //     // Esegui la query per i noleggi
    //     $rentals = $rentalQuery->get();

    //     // Filtra i noleggi in base ai risultati delle auto
    //     $filteredRentals = $rentals->filter(function ($rental) use ($cars) {
    //         return $cars->contains('id', $rental->car_id);
    //     });

//         // Passa i risultati alla vista
//         return view('catalogo', compact('filteredRentals'));
//     }

//     // Se non ci sono risultati per le auto, restituisci una vista vuota o un messaggio di nessun risultato
//     return view('nessun_risultato');
// }







//OLD

        /*$rentalQuery = Rental::query()
        ->where(function ($query) use ($startRent, $endRent) {
            $query->where('start_rent', '<=', $endRent)
                  ->where('end_rent', '>=', $startRent);
        })
        ->get();
           

        $cars = Car::all();

        // Filtra i noleggi in base ai risultati delle auto
        $filteredRentals = $rentals->filter(function ($rental) use ($cars) {
            return $cars->contains('id', $rental->car_id);
        });

        */