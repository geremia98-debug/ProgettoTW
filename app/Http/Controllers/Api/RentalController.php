<?php

/**
 * @OA\Info(
 *     title="API dei noleggi",
 *     version="1.0",
 *     description="API per la gestione dei noleggi"
 * )
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rental;
use OpenApi\Annotations as OA;


class RentalController extends Controller
{
/*
  @OA\Get(
      path="/api/rentals",
      summary="Elenco dei noleggi",
      tags={"Rentals"},
      @OA\Response(
          response=200,
          description="Restituisce un elenco di noleggi",
          @OA\JsonContent(
              type="array",
              @OA\Items(ref="#/components/schemas/Rental")
          )
      )
  )
 */
public function index()
{
    $rentals = Rental::all();
    return response()->json($rentals, 200);
}

/*
  @OA\Post(
      path="/api/rentals",
      summary="Crea un nuovo noleggio",
      tags={"Rentals"},
      @OA\RequestBody(
          @OA\JsonContent(ref="#/components/schemas/Rental")
      ),
      @OA\Response(
          response=201,
          description="Noleggio creato con successo",
          @OA\JsonContent(ref="#/components/schemas/Rental")
      )
  )
 */
public function store(Request $request)
{
    $rental = Rental::create($request->all());
    return response()->json($rental, 201);
}

/**
*  @OA\Get(
*      path="/api/rentals/{rental}",
*      summary="Ottieni i dettagli di un noleggio",
*      tags={"Rentals"},
*      @OA\Parameter(
*          name="rental",
*          in="path",
*          required=true,
*          @OA\Schema(type="integer")
*      ),
*      @OA\Response(
*          response=200,
*          description="Restituisce i dettagli di un noleggio",
*          @OA\JsonContent(ref="#/components/schemas/Rental")
*      )
*  )
 */
public function show(Rental $rental)
{
    return response()->json($rental, 200);
}

/**
*  @OA\Put(
*      path="/api/rentals/{rental}",
*      summary="Aggiorna i dettagli di un noleggio",
*      tags={"Rentals"},
*      @OA\Parameter(
*          name="rental",
*          in="path",
*          required=true,
*          @OA\Schema(type="integer")
*      ),
*      @OA\RequestBody(
*          @OA\JsonContent(ref="#/components/schemas/Rental")
*      ),
*      @OA\Response(
*          response=200,
*          description="Noleggio aggiornato con successo",
*          @OA\JsonContent(ref="#/components/schemas/Rental")
*      )
*  )
 */
public function update(Request $request, Rental $rental)
{
    $rental->update($request->all());
    return response()->json($rental, 200);
}

/**
*  @OA\Delete(
*      path="/api/rentals/{rental}",
*      summary="Elimina un noleggio",
*      tags={"Rentals"},
*      @OA\Parameter(
*          name="rental",
*          in="path",
*          required=true,
*          @OA\Schema(type="integer")
*      ),
*      @OA\Response(
*          response=204,
*          description="Noleggio eliminato con successo"
*      )
*  )
 */
public function destroy(Rental $rental)
{
    $rental->delete();
    return response()->json(null, 204);
}

}
