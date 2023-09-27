@extends('layouts.app')
@section('content')
<body>
    <div id="home">
        <div class="d-flex justify-content-center mt-4">
          <h1>Vagnoli - Noleggio Auto</h1>
        </div>

      <div >
        <img id="banner"  src="{{ asset('build\assets\fano.png') }}" alt="Fano, Italy" class="home-image">
      </div>


    <section id="vagnoli-info">
        <div class="info-box">
            <p>
                Benvenuti da Vagnoli - il miglior servizio di autonoleggio a Fano, Italia.
                Offriamo una vasta selezione di auto moderne e sicure per soddisfare tutte le vostre esigenze di viaggio.
                Il nostro team di professionisti è pronto ad assistervi e a rendere la vostra esperienza di noleggio
                piacevole e senza stress. Affidatevi a noi per esplorare Fano e i suoi dintorni con comfort e stile!
            </p>
            <p>Contattaci per informazioni e prenotazioni:</p>
            <p>Telefono: 123-456-789</p>
            <p>Email: info@vagnoli.com</p>
        </div>
        <img src="{{ asset('build\assets\geo.png') }}" alt="Location on Maps" class="maps-image">
    </section>

    <section id="car-display">



        <div class="container text-center grid">
          <div class="row">
            <div class="col-sm-6 col-md-3">

              <div class="card" style="width: 18rem;">
              <img src="dist/maserati.jpg" class="card-img-top" alt="auto-test">
              <div class="card-body">
                <h5 class="card-title">Un'auto</h5>
                <p class="card-text">Auto incredibile prezzo.</p>
                <a href="#" class="btn btn-primary">Vedi</a>
              </div>
            </div>

          </div>
            <div class="col-sm-6 col-md-3">
              <div class="card" style="width: 18rem;">
                <img src="dist/ferrari enzo.jpg" class="card-img-top" alt="auto-test">
                <div class="card-body">
                  <h5 class="card-title">Un'auto</h5>
                  <p class="card-text">Auto incredibile prezzo.</p>
                  <a href="#" class="btn btn-primary">Vedi</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="card" style="width: 18rem;">
                <img src="dist/a3.jpg" class="card-img-top" alt="auto-test">
                <div class="card-body">
                  <h5 class="card-title">Un'auto</h5>
                  <p class="card-text">Auto incredibile prezzo.</p>
                  <a href="#" class="btn btn-primary">Vedi</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="card" style="width: 18rem;">
                <img src="assets/40d66013-021d-408a-9c71-a20ebf3583c1_fiat-panda-750-iscritta-asi-1986.jpg" class="card-img-top" alt="auto-test">
                <div class="card-body">
                  <h5 class="card-title">Un'auto</h5>
                  <p class="card-text">Auto incredibile prezzo.</p>
                  <a href="#" class="btn btn-primary">Vedi</a>
                </div>
              </div>
            </div>
          </div>
        </div>


    </section>





    <div class="d-flex justify-content-center my-4">
        <h2>Domande frequenti</h2>
    </div>

    @php
        use App\Models\Faq;
        $faqs = Faq::all();
    @endphp

    <div class="accordion" id="accordionExample">
        @foreach ($faqs as $faq)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $faq->id }}">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                    <strong>{{ $faq->question }}</strong>
                </button>
            </h2>
            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    {{ $faq->answer }}
                </div>
            </div>
        </div>
        @endforeach
    </div>











<!--
    <div class="d-flex justify-content-center my-4">
      <h2>Domande frequenti</h2>
    </div>


    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <strong> Come posso prenotare un'auto?</strong>
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Prenotare un'auto con Vagnoli è semplice. Puoi farlo online tramite il nostro sito web o chiamando il nostro servizio clienti al numero fornito su questa pagina.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <strong>Quali documenti devo presentare al momento del ritiro dell'auto?</strong>
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Al momento del ritiro dell'auto, dovrai presentare una carta di credito valida, la tua patente di guida e un documento d'identità.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <strong>Posso prenotare un veicolo se ho meno di 25 anni?</strong>
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Certo, sopra i 14 anni puoi prenotare qualsiasi veicolo tu voglia.
          </div>
        </div>
      </div>
    </div>
      </div>

    -->

    </body>

@endsection


