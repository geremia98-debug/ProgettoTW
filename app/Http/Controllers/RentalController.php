<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;

class RentalController extends Controller
{

    public function store(Request $request)
    {

        $rental = new Rental();
        $user = auth()->user();
        $carId = $request->input('carId');

        $rental->user_id = $user->id;
        $rental->car_id = $carId;
        $rental->start_rent = session('start_rent');
        $rental->end_rent = session('end_rent');

        $rental->save();

        return redirect()->route('home');


    }

//     public function show(Car $car)
// {
//     return view('cars.show', compact('car'))->with('success', 'Nuova vettura registrata con successo');
// }

// public function edit(Car $car)
// {
//     return view('cars.edit', compact('user'));
// }

// public function update(Request $request, Car $car)
// {
//     $car->plate = $request->input('plate');
//     $car->brand = $request->input('marca');
//     $car->model = $request->input('modello');
//     $car->displacement = $request->input('cilindrata');
//     $car->price = $request->input('prezzo');
//     $car->seats = $request->input('posti');
//     $car->description = $request->input('descrizione');

//     $car->update();

// }

// public function destroy(Car $car)
// {
//     $car->delete();
//     return redirect()->route('cars.index')->with([
//         'success' => "La vettura {$car->brand} {$car->model} targata {$car->plate} è stata rimossa."
//     ]);
// }


}
