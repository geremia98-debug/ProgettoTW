@extends('layouts.app')
@section('content')

<!--Definire come prendere i paramentri dall'elemento car selezionato sul catalogo dopo aver applicato i filtri -->

<div>
    <h2>Dettagli dell'auto</h2>
    <p>Marca: {{ request('brand') }}</p>
    <p>Modello: {{ request('modello') }}</p>
    <p>Posti: {{ request('posti') }}</p>
    <p>Cilindrata: {{ request('cilindrata') }}</p>
    <p>Prezzo: {{ request('prezzo') }}</p>
    <p>Inizio prenotazione: {{ request('inizio_noleggio') }}</p>
    <p>Fine prenotazione: {{ request('fine_noleggio') }}</p>
</div>


<a href="{}" class="btn btn-primary">Conferma Prenotazione</a>





@endsection