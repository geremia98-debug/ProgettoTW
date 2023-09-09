<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index(Request $request)
    {
        // Recupera i filtri dall'input dell'utente
        $brand = $request->input('brand');
        $seats = $request->input('seats');
        $price = $request->input('price');

        // Costruisci la query Eloquent per le auto
        $query = Car::query();

        // Applica i filtri se sono stati forniti
        if ($brand) {
            $query->where('brand', $brand);
        }
        if ($seats) {
            $query->where('seats', $seats);
        }
        if ($price) {
            $query->where('price', '<=', $price);
        }

        // Esegui la query e ottieni i risultati
        $cars = $query->get();

        // Passa i risultati alla vista
        return view('catalog.index', compact('cars'));
    }
}
