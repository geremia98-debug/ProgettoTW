@extends('layouts.app')
@section('content')
<head>
    <title>Inserisci Auto</title>
</head>
<body>
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
</body>
@endsection

