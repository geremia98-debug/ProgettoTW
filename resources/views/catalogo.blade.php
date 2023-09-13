@extends('layouts.app')
@section('content')
    <body>
        <div class="filter-menu">
            <h3>Filtri</h3>
            <form id="filter-form" method="POST" action="{{ route('filtro') }}">
                @csrf
                <label for="brand-filter">Marca:</label>
                <select id="brand-filter" name="brand">
                    <option value="">Tutte le marche</option>
                    <option value="toyota">Toyota</option>
                    <option value="honda">Honda</option>
                </select>

                <label for="seats-filter">Posti Disponibili:</label>
                <select id="seats-filter" name="seats">
                    <option value="">Tutti i posti</option>
                    <option value="2">2</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="7">7</option>

                </select>


                <label for="min-price">Prezzo Minimo:</label>
                <select id="min-price" name="min_price">
                    <option value="0">0 euro</option>
                    <option value="50">50 euro</option>
                    <option value="100">100 euro</option>
                    <option value="150">150 euro</option>
                    <option value="200">200 euro</option>
                </select>

                <label for="max-price">Prezzo Massimo:</label>
                <select id="max-price" name="max_price">
                    <option value="50">50 euro</option>
                    <option value="100">100 euro</option>
                    <option value="150">150 euro</option>
                    <option value="200">200 euro</option>
                    <option value="9999">Più di 200 euro</option>
                </select>


                <button type="submit">Filtra</button>
            </form>
        </div>

    <div class="container">
        <h1>Auto Disponibili a Noleggio</h1>
        <div class="car-grid">
            @foreach ($cars as $car)
            <div class="car">
                <img src="{{ asset('dist/' . $car->immagine) }}" alt="Auto">
                <h2>{{ $car->brand }}</h2>
                <p>Modello: {{ $car->model }}</p>
                <p>Posti: {{ $car->seats }}</p>
                <p>Cilindrata: {{ $car->displacement }}</p>
                <p>Prezzo: ${{ $car->price }} al giorno</p>
            </div>
            @endforeach
        </div>
    </div>
</body>
@endsection
