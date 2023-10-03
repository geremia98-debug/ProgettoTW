@extends('layouts.app')
@section('content')
    <body>
        <div class="filter-menu">
            <h3>Filtri</h3>
            <form id="filter-form" method="POST" action="{{ route('filtro') }}">
                @csrf

                <label for="start_rent">Inizio Noleggio:</label>
                <input type="date" id="start_rent" name="start_rent" onkeydown="return false" onpaste="return false">

                <label for="end_rent">Fine Noleggio:</label>
                <input type="date" id="end_rent" name="end_rent" onkeydown="return false" onpaste="return false" >

                <label for="min-price">Prezzo Minimo:</label>
                <select id="min-price" name="min-price">
                    <option value="0">Nessun filtro</option>
                    <option value="0">0 euro</option>
                    <option value="50">50 euro</option>
                    <option value="100">100 euro</option>
                    <option value="150">150 euro</option>
                    <option value="200">200 euro</option>
                </select>

                <label for="max-price">Prezzo Massimo:</label>
                <select id="max-price" name="max-price">
                    <option value="9999">Nessun filtro</option>
                    <option value="50">50 euro</option>
                    <option value="100">100 euro</option>
                    <option value="150">150 euro</option>
                    <option value="200">200 euro</option>
                    <option value="9999">Più di 200 euro</option>
                </select>

                <label for="seats-filter">Posti Disponibili:</label>
                <select id="seats-filter" name="seats">
                    <option value="">Tutti i posti</option>
                    <option value="2">2</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="7">7</option>
                    <option value="9">9</option>
                </select>

                <button type="submit" class="btn btn-primary">Filtra</button>
            </form>
        </div>

    <div class="container">
        <h1>Auto Disponibili a Noleggio</h1>
        @if(isset($errorMessage))
        <div class="alert alert-danger">
            {{ $errorMessage }}
        </div>
        @else
        <div class="car-grid">
            @foreach ($cars as $car)
            <div class="car">
                <img class="car img" src="{{ asset('images/cars/' . $car->image) }}" alt="Auto">
                <h2>{{ $car->brand }}</h2>
                <p>Modello: {{ $car->model }}</p>
                <p>Posti: {{ $car->seats }}</p>
                <p>Cilindrata: {{ $car->displacement }}</p>
                <p>Prezzo: ${{ $car->price }} al giorno</p>
                <!-- Mostra pulsante Prenota solo se le date di noleggio sono state inserite. -->
                @if (!empty(request('start_rent')) && !empty(request('end_rent')))
                    @cannot('staff_admin')
                    <!-- Mostra pulsante Prenota solo se l'utente è loggato, altrimenti mostra un messaggio. -->
                    @if (auth()->check())
                    <a href="{{ route('prenotaAuto', ['car_id' => $car->id]) }}" class="btn btn-primary">Prenota</a>
                    @else
                    <a class="btn btn-primary">Accedi per prenotare</a>
                    @endif
                    @endcannot
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @endif
</body>
@endsection

