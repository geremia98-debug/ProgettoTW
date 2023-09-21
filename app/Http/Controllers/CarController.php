<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Date;

class CarController extends Controller
{
    public function index(Request $request)
    {

    }

    public function creaAuto()
{
    return view('inserisci_auto', ['carRentals' => []]);

}

public function doubleActionStaffPanel(Request $request)
{
    if ($request->input('azione') === 'update_car') {
        // Esegui l'azione 1
    } elseif ($request->input('azione') === 'delete_car ') {
        // Esegui l'azione 2
    } else {
        // Nessun pulsante corrispondente è stato premuto
    }

    // Volendo posso reindirizzare l'utente o restituire una vista in base all'azione eseguita.
}


public function getCarRentalsByMonth(Request $request)
{
    $month = $request->input('month', date('m'));
    $year = Date::now()->year;


    $carRentals= DB::table('car_user')
    ->join('cars', 'car_user.car_id', '=', 'cars.id')
    ->join('users', 'car_user.user_id', '=', 'users.id')
    ->select('cars.plate', 'cars.brand', 'cars.model', 'users.firstname', 'users.lastname')
    ->whereYear('car_user.start_rent', $year)
    ->whereMonth('car_user.start_rent', $month)
    ->orWhere(function ($query) use ($year, $month) {
        $query->whereYear('car_user.end_rent', $year)
              ->whereMonth('car_user.end_rent', $month);
    })
    ->get();

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

    $car->brand = $request->input('brand');
    $car->model = $request->input('model');
    $car->plate = $request->input('plate');
    $car->displacement = $request->input('displacement');
    $car->seats = $request->input('seats');
    $car->description = $request->input('description');
    $car->price = $request->input('price');

    $car->update();
    return view('home')->with([
        'success' => "La vettura {$car->brand} {$car->model} targata {$car->plate} è stata aggiornata."
    ]);

}

public function destroy(Car $car)
{
    $car->delete();
    return view('home')->with([
        'success' => "La vettura {$car->brand} {$car->model} targata {$car->plate} è stata rimossa."
    ]);
}

public function updateOrDelete(Request $request)
{
    $carId = $request->input('car_id');
    $car = Car::find($carId);
    if ($request->has('car_button')) {
        $action = $request->input('car_button');

        if ($action === 'update_car') {
            // Esegui l'aggiornamento dell'auto qui
            $car->plate = $request->input('plate');
            $car->brand = $request->input('brand');
            $car->model = $request->input('model');
            $car->displacement = $request->input('displacement');
            $car->price = $request->input('price');
            $car->seats = $request->input('seats');
            $car->description = $request->input('description');
            $car->update();
            return redirect()->route('staff')->with([
                'success' => "La vettura è stata aggiornata."
            ]);
        } elseif ($action === 'delete_car') {
            // Esegui l'eliminazione dell'auto qui
            $car->delete();
            return redirect()->route('staff')->with([
                'success' => "La vettura {$car->brand} {$car->model} targata {$car->plate} è stata rimossa."
            ]);
        }
    }

    // Redirect a una pagina appropriata dopo l'azione
    return redirect()->route('staff')->with([
        'success' => 'Azioni completate con successo.'
    ]);
}


}
