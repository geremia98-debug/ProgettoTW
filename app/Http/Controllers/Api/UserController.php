<?php

/**
 * @OA\Info(
 *    title="API degli utenti",
 *    version="1.0",
 *    description="API per la gestione degli utenti"
 * )
 */
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Car;
use OpenApi\Annotations as OA;


class UserController extends Controller
{
/**
*  @OA\Get(
*      path="/api/users",
*      summary="Elenco degli utenti",
*      tags={"Users"},
*      @OA\Response(
*          response=200,
*          description="Restituisce un elenco di utenti",
*          @OA\JsonContent(
*              type="array",
*              @OA\Items(ref="#/components/schemas/User")
*          )
*      )
*  )
 */
public function index()
{
    $users = User::all();
    return response()->json($users, 200);
}

/**
* @OA\Post(
*     path="/api/users",
*     summary="Crea un nuovo utente",
*     tags={"Users"},
*     @OA\RequestBody(
*         @OA\JsonContent(ref="#/components/schemas/User")
*     ),
*     @OA\Response(
*         response=201,
*         description="Utente creato con successo",
*         @OA\JsonContent(ref="#/components/schemas/User")
*     )
* )
 */
public function store(Request $request)
{
    $user = User::create($request->all());
    return response()->json($user, 201);
}

/**
*  @OA\Get(
*      path="/api/users/{user}",
*      summary="Ottieni i dettagli di un utente",
*      tags={"Users"},
*      @OA\Parameter(
*          name="user",
*          in="path",
*          required=true,
*          @OA\Schema(type="integer")
*      ),
*      @OA\Response(
*          response=200,
*          description="Restituisce i dettagli di un utente",
*          @OA\JsonContent(ref="#/components/schemas/User")
*      )
*  )
 */
public function show(User $user)
{
    return response()->json($user, 200);
}

/**
* @OA\Put(
*     path="/api/users/{user}",
*     summary="Aggiorna i dettagli di un utente",
*     tags={"Users"},
*     @OA\Parameter(
*         name="user",
*         in="path",
*         required=true,
*         @OA\Schema(type="integer")
*     ),
*     @OA\RequestBody(
*         @OA\JsonContent(ref="#/components/schemas/User")
*     ),
*     @OA\Response(
*         response=200,
*         description="Utente aggiornato con successo",
*         @OA\JsonContent(ref="#/components/schemas/User")
*     )
* )
 */
public function update(Request $request, User $user)
{
    $user->update($request->all());
    return response()->json($user, 200);
}

/**
*  @OA\Delete(
*      path="/api/users/{user}",
*      summary="Elimina un utente",
*      tags={"Users"},
*      @OA\Parameter(
*          name="user",
*          in="path",
*          required=true,
*          @OA\Schema(type="integer")
*      ),
*      @OA\Response(
*          response=204,
*          description="Utente eliminato con successo"
*      )
*  )
 */
public function destroy(User $user)
{
    $user->delete();
    return response()->json(null, 204);
}
}
