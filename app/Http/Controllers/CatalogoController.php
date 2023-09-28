<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

    session(['start_rent' => $startRent]);
    session(['end_rent' => $endRent]);

    // Validazione delle date
    $currentDate = now(); // Data odierna
    $startRentDate = \Carbon\Carbon::createFromFormat('Y-m-d', $startRent);
    $endRentDate = \Carbon\Carbon::createFromFormat('Y-m-d', $endRent);

    if ($startRentDate->lessThanOrEqualTo($currentDate) || $endRentDate->lessThanOrEqualTo($currentDate)) {
        $errorMessage = 'Le date di noleggio devono essere successive a quella odierna.';
        return view('catalogo', compact('errorMessage'));
    }



        // FILTRI TABELLA CAR_USER (DATE DISPONIBILI)
        $rentedCarIds = Rental::query()
        ->where(function ($query) use ($startRent, $endRent) {
            $query->where('start_rent', '<=', $endRent)
                ->where('end_rent', '>=', $startRent);
        })
        ->pluck('car_id');
        //pluck() serve a estrarre una sola colonna da una tabella
        //In questo caso ci servono solo i car_id per poi proseguire coi filtri sulla tabella cars


        // Ottieni tutte le car che NON sono nell'array di car_id (quelle NON prenotate)
        $cars = Car::query()
        ->whereNotIn('id', $rentedCarIds);


        // FILTRI TABELLA CARS (PREZZO E POSTI)

        $cars->when($minPrice, function ($query, $minPrice) {
            return $query->where('price', '>=', $minPrice);
        });

        $cars->when($maxPrice, function ($query, $maxPrice) {
            return $query->where('price', '<=', $maxPrice);
        });

        $cars->when($seats, function ($query, $seats) {
            return $query->where('seats', $seats);
        });

        $cars = $cars->get();


        // Passa i risultati alla vista
        return view('catalogo', compact('cars'));


    // Se non ci sono risultati per le auto, restituisci una vista vuota o un messaggio di nessun risultato (cambiare la logica attuale)
    return view('home');
}
}
