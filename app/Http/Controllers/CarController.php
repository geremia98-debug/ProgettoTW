<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index(Request $request)
    {

    }

    public function creaAuto()
{
    return view('inserisci_auto', ['carRentals' => []]);

}

public function getCarRentalsByMonth($month, $year)
{
    $month = $request->input('month', date('m')); // Ottieni il mese dal form o usa il mese corrente
    $year = Date::now()->year; // Ottieni l'anno corrente

    $carRentals = DB::table('cars')
        ->select('cars.brand', 'cars.model', 'cars.plate', 'user.firstname', 'user.surname')
        ->join('car_user', 'cars.id', '=', 'car_user.car_id')
        ->join('user', 'car_user.user_id', '=', 'user.id')
        ->whereMonth('car_user.data_inizio', '=', $month)
        ->whereYear('car_user.data_inizio', '=', $year) 
        ->get();
        dd($carRentals);
    return view('inserisci_auto', ['carRentals' => $carRentals]);
}

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'plate' => 'required|unique:cars',
            'brand' => 'required',
            'model' => 'required',
            'displacement' => 'required|integer',
            'daily_price' => 'required|integer',
            'seats' => 'required|integer',
            'description' => 'required',
        ]);

        $car = new Car();

        $car->plate = $request->input('plate');
        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->displacement = $request->input('displacement');
        $car->price = $request->input('daily_price');
        $car->seats = $request->input('seats');
        $car->description = $request->input('description');


        $car->save();

        return redirect()->route('home');  //non rimanda alla giusta pagina


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
    $car->plate = $request->input('plate');
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
