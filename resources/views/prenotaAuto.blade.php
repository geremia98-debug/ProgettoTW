@extends('layouts.app')
@section('content')


<div style="display: flex;">
    <div style="flex: 1;">
        <h2>Dettagli dell'auto</h2>

        @php
            $carId = request('car_id');
            $car = App\Models\Car::find($carId);
        @endphp

        <p>Marca: {{ $car->brand }}</p>
        <p>Modello: {{ $car->model }}</p>
        <p>Posti: {{ $car->seats }}</p>
        <p>Cilindrata: {{ $car->displacement }}</p>
        <p>Prezzo giornaliero: {{ $car->price }}</p>
        <p>Inizio prenotazione: {{ session('start_rent') }}</p>
        <p>Fine prenotazione: {{ session('end_rent') }}</p>
    </div>
    <div style="flex: 1;">
        <h2>Dati personali </h2>

        @php
             $user = auth()->user();
        @endphp

        <p>Nome: {{$user->name}} </p>
        <p>Cognome: {{$user->surname}} </p>
        <p>Data di nascita: {{$user->birthdate}} </p>
        <p>indirizzo di residenza: {{$user->residence}} </p>
    </div>
</div>

<div class="d-flex justify-content-center">
    <a href="{}" class="btn btn-primary">Conferma Prenotazione</a>
</div>







@endsection
