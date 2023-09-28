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

    // Dati Noleggi per Mese

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
            return view('adminPanel', compact('errorMessage'));
        }
        else
        {
            return view('adminPanel', ['carRentals' => $carRentals]);
        }

    }


    // Crea Auto

    public function store(Request $request)
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


        // Modifica/Cancella Auto

        public function updateOrDelete(Request $request)
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

}
