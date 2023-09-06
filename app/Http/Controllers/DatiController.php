<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Assicurati di importare il modello User corretto
use Illuminate\Support\Facades\Hash; // Importa la classe Hash per la gestione delle password


class DatiController extends Controller
{
    public function salva(Request $request)
{
    // Validazione dei dati (se necessario)
    $request->validate([
        'nome' => 'required|string|max:20',
        'cognome' => 'required|string|max:25',
        'data_nascita' => 'required|date|maggiorenne',
        'username' => 'required|string|max:15',
        'password' => 'required|min:8|confirmed:password_confirmation',


    ]);

    // Salvataggio dei dati nel database
    \App\Models\User::create($request->all());

    return redirect()->route('areaPersonale');
}

}
