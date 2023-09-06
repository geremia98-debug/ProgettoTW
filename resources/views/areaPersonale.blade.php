@extends('layouts.app')
@section('content')
<body>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Personale Utente</title>
    <style>
        /* Aggiungi qui i tuoi stili CSS */
    </style>
</head>
<body>
    <header>
        <h1>Benvenuto nell'Area Personale</h1>
    </header>
    <section id="user-data">
        <h2>I Tuoi Dati Personali</h2>
        <div>
            <p><strong>Nome:</strong> <span id="user-name"> {{$user->nome}}</span></p>
            <p><strong>Cognome:</strong> <span id="user-lastname">{{$user->cognome}}</span></p>
            <!-- Aggiungi altre informazioni qui -->
        </div>
    </section>
    <footer>
        <p>&copy; 2023 Nome della Tua Azienda</p>
    </footer>

    <script>

        // Popola i campi dei dati personali con i valori dell'utente
        document.getElementById("user-name").textContent = userData.name;
        document.getElementById("user-lastname").textContent = userData.lastname;
        // Aggiungi altre assegnazioni per gli altri campi

        // Puoi utilizzare JavaScript per richiedere dati dal server o da un database reale
    </script>
</body>
@endsection
</html>
