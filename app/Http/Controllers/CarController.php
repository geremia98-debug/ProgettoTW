<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;


class CarController extends Controller
{
    public function creaAuto()
    {
        return view('staff', ['carRentals' => []]);
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

// metodi della pagina dello staffer

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

        return view('staff');
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

        if (count($carRentals) === 0) {
            $errorMessage = 'Non ci sono noleggi durante questo mese';
            return view('staff', compact('errorMessage'));
        }
        else
        {
            return view('staff', ['carRentals' => $carRentals]);
        }

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
    }


    // metodi della pagina dell'admin

    public function storeByAdmin(Request $request)
        {
            $validatedData = $request->validate([
                'brand' => 'required',
                'model' => 'required',
                'plate' => 'required|unique:cars',
                'displacement' => 'required|integer',
                'seats' => 'required|integer',
                'description' => 'required',
                'daily_price' => 'required|integer',
            ]);

            $car = new Car();
            $car->brand = $request->input('brand');
            $car->model = $request->input('model');
            $car->plate = $request->input('plate');
            $car->displacement = $request->input('displacement');
            $car->seats = $request->input('seats');
            $car->description = $request->input('description');
            $car->price = $request->input('daily_price');

            $car->save();

            return view('adminPanel');
        }

        public function updateOrDeleteByAdmin(Request $request)
    {
        $carId = $request->input('car_id');
        $car = Car::find($carId);
        if ($request->has('car_button')) {
            $action = $request->input('car_button');

            if ($action === 'update_car') {
                $car->plate = $request->input('plate');
                $car->brand = $request->input('brand');
                $car->model = $request->input('model');
                $car->displacement = $request->input('displacement');
                $car->price = $request->input('price');
                $car->seats = $request->input('seats');
                $car->description = $request->input('description');
                $car->update();
                return redirect()->route('adminPanel')->with([
                    'success' => "La vettura è stata aggiornata."
                ]);
            } elseif ($action === 'delete_car') {
                $car->delete();
                return redirect()->route('adminPanel')->with([
                    'success' => "La vettura {$car->brand} {$car->model} targata {$car->plate} è stata rimossa."
                ]);
            }
        }
    }
    public function getCarRentalsByMonthByAdmin(Request $request)
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

        return view('adminPanel', ['carRentals' => $carRentals]);
    }
}
