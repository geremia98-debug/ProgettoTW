
<head>
    <title>Registrazione</title>
</head>
<body>
    <h1>Registrazione</h1>

    <?php
    // Gestione del form dopo la sottomissione
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $dataNascita = $_POST["data_nascita"];
        $occupazione = $_POST["occupazione"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confermaPassword = $_POST["conferma_password"];

        // Verifica se le password corrispondono
        if ($password !== $confermaPassword) {
            echo "Le password non corrispondono. Riprova.";
        } else {
            // Qui dovresti effettuare l'hash della password prima di salvarla nel database
            // Esempio: $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Ora puoi salvare i dati nel tuo database o fare altre operazioni
            // ...

            echo "Registrazione completata con successo!";
        }
    }
    ?>

    <form method="POST" action="">
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
            <option value="altro">Cassiere di supermercato</option>
            <option value="altro">Infermiere ospedaliero</option>
            <option value="altro">Muratore edile</option>
            <option value="altro">Insegnante elementare</option>
            <option value="altro">Cuoco ristorante</option>
            <option value="altro">Camionista</option>
            <option value="altro">Segretario amministrativo</option>
            <option value="altro">Addetto risorse umane</option>
            <option value="altro">Elettricista</option>
            <option value="altro">Commesso di negozio</option>
            <option value="altro">Disoccupato</option>
            <option value="altro">Altro</option>

        </select><br>

        <label>Username:</label>
        <input type="text" name="username" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <label>Conferma password:</label>
        <input type="password" name="conferma_password" required><br>

        <input type="submit" value="Registrati">
    </form>
</body>

