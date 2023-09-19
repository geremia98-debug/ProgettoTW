<?php

/**
 * @OA\Info(
 *     title="API delle auto",
 *     version="1.0",
 *     description="Descrizione dell'API delle auto"
 *)
*/


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use OpenApi\Annotations as OA;


class CarController extends Controller
{

 /**
*  @OA\Get(
*      path="/api/cars",
*      summary="Elenco delle auto",
*      tags={"Cars"},
*      @OA\Response(
*          response=200,
*          description="Restituisce un elenco di auto",
*          @OA\JsonContent(
*              type="array",
*              @OA\Items(ref="#/components/schemas/Car")
*          )
*      )
*  )
 */

    public function index()
    {
        $cars = Car::all();
        return response()->json($cars, 200);
    }

/**
*  @OA\Post(
*      path="/api/cars",
*      summary="Crea una nuova auto",
*      tags={"Cars"},
*      @OA\RequestBody(
*          @OA\JsonContent(ref="#/components/schemas/Car")
*      ),
*      @OA\Response(
*          response=201,
*          description="Auto creata con successo",
*          @OA\JsonContent(ref="#/components/schemas/Car")
*      )
*  )
 */
    public function store(Request $request)
    {
        $cars = Car::create($request->all());
        return response()->json($cars, 201);
    }

/**
* @OA\Get(
*     path="/api/cars/{car}",
*     summary="Ottieni i dettagli di un'auto",
*     tags={"Cars"},
*     @OA\Parameter(
*         name="car",
*         in="path",
*         required=true,
*         @OA\Schema(type="integer")
*     ),
*     @OA\Response(
*         response=200,
*         description="Restituisce i dettagli di un'auto",
*         @OA\JsonContent(ref="#/components/schemas/Car")
*     )
* )
 */
    public function show(Car $car)
    {
        return response()->json($car, 200);
    }

/**
*  @OA\Put(
*      path="/api/cars/{car}",
*      summary="Aggiorna i dettagli di un'auto",
*      tags={"Cars"},
*      @OA\Parameter(
*          name="car",
*          in="path",
*          required=true,
*          @OA\Schema(type="integer")
*      ),
*      @OA\RequestBody(
*          @OA\JsonContent(ref="#/components/schemas/Car")
*      ),
*      @OA\Response(
*          response=200,
*          description="Auto aggiornata con successo",
*          @OA\JsonContent(ref="#/components/schemas/Car")
*      )
*  )
 */
    public function update(Request $request, Car $car)
    {
        $car->update($request->all());
        return response()->json($car, 200);
    }

/**
*  @OA\Delete(
*      path="/api/cars/{car}",
*      summary="Elimina un'auto",
*      tags={"Cars"},
*      @OA\Parameter(
*          name="car",
*          in="path",
*          required=true,
*          @OA\Schema(type="integer")
*      ),
*      @OA\Response(
*          response=204,
*          description="Auto eliminata con successo"
*      )
*  )
 */
    public function destroy(Car $car)
    {
        $car->delete();
        return response()->json(null, 204);
    }
}

