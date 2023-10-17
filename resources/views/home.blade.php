@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="public/css/myStyle.css">
<body>
    <div id="home">
        <div class="d-flex justify-content-center mt-4">
          <h1>Vagnoli - Noleggio Auto</h1>
        </div>

      <div >
        <img id="banner"  src="{{ asset('build\assets\fano.jpg') }}" alt="Fano, Italy" class="home-image">
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
        <img src="{{ asset('build\assets\geo.jpg') }}" alt="Location on Maps" class="maps-image">
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
    </body>

@endsection


