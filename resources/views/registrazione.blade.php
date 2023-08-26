
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

        <label>Occupazione:</label>
        <select name="occupazione">
            <option value="studente">Studente</option>
            <option value="lavoratore">Lavoratore</option>
            <option value="altro">Altro</option>
        </select><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <label>Conferma password:</label>
        <input type="password" name="conferma_password" required><br>

        <input type="submit" value="Registrati">
    </form>
</body>

