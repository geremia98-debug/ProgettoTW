<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request)
{
    $user = new User();

    $user->firstname = $request->input('nome');
    $user->lastname = $request->input('cognome');
    $user->data_nascita = $request->input('data_nascita');
    $user->residence = $request->input('luogo_residenza');
    $user->job = $request->input('occupazione');
    $user->username = $request->input('username');
    $user->password = $request->input('password');

    $user->save();

    Auth::login($user);

    return redirect('/area-personale')->with('success', 'Nuovo utente registrato con successo');

}

public function areaPersonale($username)
{
    $user = User::where('username', $username)->first();
    if (!$user) {      
        return abort(404); 
    }

    return view('areaPersonale', compact('user'));
}

// ci servono per la gestione e l'eliminazione degli user

public function show(User $user)  
{
    return view('users.show', compact('user'));
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

