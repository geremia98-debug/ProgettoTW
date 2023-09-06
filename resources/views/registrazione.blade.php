<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>Registrazione</title>
</head>
<body>
    <h1>Registrazione</h1>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <label>Nome:</label>
        <input type="text" name="nome" required><br>

        <label>Cognome:</label>
        <input type="text" name="cognome" required><br>

        <label>Data di nascita:</label>
        <input type="date" name="data_nascita" required><br>

        <label>Luogo di residenza:</label>
        <input type="text" name="luogo_residenza" required><br>

        <label>Occupazione:</label>
        <select name="occupazione">
            <option value="studente">Studente</option>
            <option value="lavoratore">Lavoratore</option>
            <option value="Cassiere di supermercato">Cassiere di supermercato</option>
            <option value="Infermiere ospedaliero">Infermiere ospedaliero</option>
            <option value="Muratore edile">Muratore edile</option>
            <option value="Insegnante elementare">Insegnante elementare</option>
            <option value="Cuoco ristorante">Cuoco ristorante</option>
            <option value="Camionista">Camionista</option>
            <option value="Segretario amministrativo">Segretario amministrativo</option>
            <option value="Addetto risorse umane">Addetto risorse umane</option>
            <option value="Elettricista">Elettricista</option>
            <option value="Commesso di negozio">Commesso di negozio</option>
            <option value="Disoccupato">Disoccupato</option>
            <option value="altro">Altro</option>

        </select><br>

        <label>Username:</label>
        <input type="text" name="username" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <label>Conferma password:</label>
        <input type="password" name="password_confirmation" required><br>

        <input type="submit" value="Registrati">
    </form>
</body>
</html>

