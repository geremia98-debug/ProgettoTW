<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    //  Gestione del form dopo la sottomissione
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     $nome = $_POST["nome"];
    //     $cognome = $_POST["cognome"];
    //     $dataNascita = $_POST["data_nascita"];
    //     $occupazione = $_POST["occupazione"];
    //     $email = $_POST["email"];
    //     $password = $_POST["password"];
    //     $confermaPassword = $_POST["pasword_confirmation"];

    //     // Verifica se le password corrispondono
    //     if ($password !== $confermaPassword) {
    //         echo "Le password non corrispondono. Riprova.";
    //     } else {
    //         // Qui dovresti effettuare l'hash della password prima di salvarla nel database
    //         // Esempio: $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //         // Ora puoi salvare i dati nel tuo database o fare altre operazioni
    //         // ...

    //         echo "Registrazione completata con successo!";
    //     }
    // }


    public function store(Request $request)
{
    dd($request);
    $validatedData = $request->validate([
        'nome' => 'required',
        'cognome' => 'required',
        'data_nascita' => 'required',
        'luogo_residenza' => 'required',
        'occupazione' => 'required',
        'username' => 'required|unique:users',
        'password' => 'required|confirmed',
    ]);

    $user = new User();

    $user->firstname = $request->input('nome');
    $user->lastname = $request->input('cognome');
    $user->birthdate = $request->input('data_nascita');
    $user->residence = $request->input('luogo_residenza');
    $user->job = $request->input('occupazione');
    $user->username = $request->input('username');
    $user->password = $request->input('password');


    $user->save();

    Auth::login($user);
    return redirect()->route('areaPersonale');

//    return redirect()->route('users.show');



}

// ci servono per la gestione e l'eliminazione degli user

public function show(User $user)
{
    return view('users.show', compact('user'))->with('success', 'Nuovo utente registrato con successo');
}

public function edit(User $user)
{
    return view('users.edit', compact('user'));
}

public function update(Request $request, User $user)
{
    $user->firstname = $request->input('nome');
    $user->lastname = $request->input('cognome');
    $user->data_nascita = $request->input('data_nascita');
    $user->residence = $request->input('luogo_residenza');
    $user->job = $request->input('occupazione');
    $user->username = $request->input('username');
    $user->password = $request->input('password');

    $user->update();

}

public function destroy(User $user)
{
    $user->delete();
    return redirect()->route('users.index')->with([
        'success' => "L'utente {$user->firstname} {$user->lastname}è stato cancellato."
    ]);
}

}
