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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'targa' => 'required|unique:cars',
            'marca' => 'required',
            'modello' => 'required',
            'cilindrata' => 'required|integer',
            'prezzo' => 'required|integer',
            'posti' => 'required|integer',
            'descrizione' => 'required',
        ]);

        $car = new Car();

        $car->plate = $request->input('targa');
        $car->brand = $request->input('marca');
        $car->model = $request->input('modello');
        $car->displacement = $request->input('cilindrata');
        $car->price = $request->input('prezzo');
        $car->seats = $request->input('posti');
        $car->description = $request->input('descrizione');


        $car->save();


    }

    public function show(Car $car)
{
    return view('cars.show', compact('car'))->with('success', 'Nuova vettura registrata con successo');
}

public function edit(Car $car)
{
    return view('cars.edit', compact('user'));
}

public function update(Request $request, Car $car)
{
    $car->plate = $request->input('targa');
    $car->brand = $request->input('marca');
    $car->model = $request->input('modello');
    $car->displacement = $request->input('cilindrata');
    $car->price = $request->input('prezzo');
    $car->seats = $request->input('posti');
    $car->description = $request->input('descrizione');

    $car->update();

}

public function destroy(Car $car)
{
    $car->delete();
    return redirect()->route('cars.index')->with([
        'success' => "La vettura {$car->brand} {$car->model} targata {$car->plate} è stata rimossa."
    ]);
}


}
