@extends('layouts.app')
@section('content')

@php
    $cars = \App\Models\Car::all();
@endphp

<body>

    <h1>PANNELLO DI CONTROLLO STAFF</h1>

    <!--
    <h1>Inserisci Dati dell'Auto</h1>
    <form method="POST" action="{{ route('car.store') }}">
        @csrf
        <label for="brand">Marca:</label>
        <input type="text" name="brand" required><br><br>

        <label for="model">Modello:</label>
        <input type="text" name="model" required><br><br>

        <label for="plate">Targa:</label>
        <input type="text" name="plate" required><br><br>

        <label for="daily_price">Prezzo giornaliero:</label>
        <input type="number" name="daily_price" required><br><br>

        <label for="displacement">Cilindrata:</label>
        <input type="number" name="displacement" required><br><br>

        <label for="seats">Posti:</label>
        <input type="number" name="seats" required><br><br>

        <label for="description">Descrizione:</label>
        <textarea name="description" rows="4" required></textarea><br><br>

        <button type="submit">Salva</button>
    </form>

-->
<br>
<h1>Tabella Macchine</h1>

    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modello</th>
                <th>Targa</th>
                <th>Cilindrata</th>
                <th>Numero Posti</th>
                <th>Descrizione</th>
                <th>Prezzo</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @php
                $cars = DB::table('cars')->get();
            @endphp
            @foreach($cars as $car)
            <tr>
                <td>{{ $car->brand }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->plate }}</td>
                <td>{{ $car->displacement }}</td>
                <td>{{ $car->seats }}</td>
                <td>{{ $car->description }}</td>
                <td>{{ $car->price }}</td>
                <td>
                    <button>Modifica</button>
                    <button type="submit"> Cancella</button>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>


    <h1>Noleggi Auto per il Mese</h1>

<!-- Aggiungi un form per selezionare il mese e l'anno desiderati -->
<form action="{{ route('staff') }}" method="POST">
    @csrf
    <label for="month">Mese:</label>
    <select name="month" id="month">

        <option value="1">Gennaio</option>
        <option value="2">Febbraio</option>
        <option value="3">Marzo</option>
        <option value="4">Aprile</option>
        <option value="5">Maggio</option>
        <option value="6">Giugno</option>
        <option value="7">Luglio</option>
        <option value="8">Agosto</option>
        <option value="9">Settembre</option>
        <option value="10">Ottobre</option>
        <option value="11">Novembre</option>
        <option value="12">Dicembre</option>
    </select>

    <label for="year">Anno {{ now()->year }}</label>


    <button type="submit">Cerca</button>
</form>

<table class="table">
    <thead>
        <tr>
            <th>Marca</th>
            <th>Modello</th>
            <th>Targa</th>
            <th>Nome Utente</th>
            <th>Cognome Utente</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($carRentals as $carRental)
        <tr>
            <td>{{ $carRental->brand }}</td>
            <td>{{ $carRental->model }}</td>
            <td>{{ $carRental->plate }}</td>
            <td>{{ $carRental->firstname }}</td>
            <td>{{ $carRental->lastname }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


<h1>Inserimento Nuova Auto</h1>

<form method="POST" action="{{ route('car.store') }}">
    @csrf
<table>
    <thead>
        <tr>
            <th>Marca</th>
            <th>Modello</th>
            <th>Targa</th>
            <th>Cilindrata</th>
            <th>Numero Posti</th>
            <th>Prezzo</th>
            <th>Descrizione</th>
            <th>Azioni</th>
        </tr>
    </thead>
    <tbody>

        <br>
        <br>

    <tr>
        <td>
            <input type="text" name="brand" required><br><br>
        </td>
        <td>
            <input type="text" name="model" required><br><br>
        </td>
        <td>
            <input type="text" name="plate" required><br><br>
        </td>
        <td>
            <input type="number" name="daily_price" required><br><br>
        </td>
        <td>
            <input type="number" name="displacement" required><br><br>
        </td>
        <td>
            <input type="number" name="seats" required><br><br>
        </td>
        <td>
            <textarea name="description" rows="4" required></textarea><br><br>
        </td>
        <td>
            <button type="submit">Salva Nuova Auto</button>
        </td>
    </tr>
    </tbody>
</table>
</form>

</body>
@endsection

