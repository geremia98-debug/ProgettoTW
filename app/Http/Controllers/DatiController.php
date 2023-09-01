<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        'password' => 'required|min:8|confirmed:conferma_password',

    ]);

    // Salvataggio dei dati nel database
    \App\Models\User::create($request->all());
    
    return redirect()->route('areaPersonale');
}

}
