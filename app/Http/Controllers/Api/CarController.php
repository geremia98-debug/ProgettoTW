<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return response()->json($cars, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cars = Car::create($request->all());
        return response()->json($cars, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return response()->json($car, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $car->update($request->all());
        return response()->json($car, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return response()->json(null, 204);
    }
}

// comando per aggiungere auto
// Invoke-RestMethod -Uri http://localhost:8000/api/cars -Method Post -Headers @{"Content-Type"="application/json"} -Body '{"plate":"AA123BB","brand":"Lexus","model":"Ciccia4","displacement":"1300","price":"230","seats":"4","description":"Auto spectacularissss"}'
