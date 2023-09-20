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
