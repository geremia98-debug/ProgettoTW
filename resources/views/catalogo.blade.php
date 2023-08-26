<body>
    <header>
        @include('partials.navbar')
    </header>

    <!-- inizia la pagina catalogo auto dopo la navbar-->

    <body>
    <div class="container">
        <h1>Auto Disponibili a Noleggio</h1>
        <div class="car-grid">
            <div class="car">
                <img src="dist/maserati.jpg" alt="Auto 1">
                <h2>maserati</h2>
                <p>Anno: 2023</p>
                <p>Prezzo: $150 al giorno</p>
            </div>
            <!-- Aggiungi altre auto simili qui -->
            <div class="car">
                  <img src="dist/a3.jpg" alt="Auto 1">
                  <h2>audi a3</h2>
                  <p>Anno: 2021</p>
                  <p>Prezzo: $50 al giorno</p>
            </div>
            <div class="car">
                    <img src="dist/ferrari enzo.jpg" alt="Auto 1">
                    <h2>ferrari enzo</h2>
                    <p>Anno: 1980</p>
                    <p>Prezzo: $200 al giorno</p>
            </div>
            <div class="car">
                    <img src="dist/punto.jpg" alt="Auto 1">
                    <h2>fiat punto</h2>
                    <p>Anno: 2007</p>
                    <p>Prezzo: $1,5 al giorno</p>
            </div>
        </div>
    </div>
</body>



    <footer>
        @include('partials.footer')
    </footer>
