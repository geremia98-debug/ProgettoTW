@extends('layouts.app')
@section('content')
<head>
    <title>Inserisci Auto</title>
</head>
<body>
    <h1>Inserisci Dati dell'Auto</h1>
    <form method="POST" action="{{ route('car.store') }}">
        @csrf
        <label for="brand">Brand:</label>
        <input type="text" name="marca" required><br><br>

        <label for="model">Model:</label>
        <input type="text" name="modello" required><br><br>

        <label for="plate">Plate:</label>
        <input type="text" name="targa" required><br><br>

        <label for="daily_price">Daily Price:</label>
        <input type="number" name="prezzo" required><br><br>

        <label for="displacement">Displacement:</label>
        <input type="number" name="cilindrata" required><br><br>

        <label for="seats">Seats:</label>
        <input type="number" name="posti" required><br><br>

        <label for="description">Description:</label>
        <textarea name="descrizione" rows="4" required></textarea><br><br>

        <button type="submit">Salva</button>
    </form>
</body>
@endsection

