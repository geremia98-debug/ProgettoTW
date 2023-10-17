@php
    use Illuminate\Contracts\Auth\Guard;
@endphp

<nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Autonoleggio Vagnoli S.N.C</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="nav-ul">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/catalogo">Catalogo Auto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/chi-siamo">Chi Siamo</a>
            </li>
          </ul>




            @if (auth()->check())
                <label class="logged-user-label">{{ Auth::user()->username }}</label>
                @if (Auth::user()->role === 'client')
                    <a href="{{ route('area-personale') }}" class="btn btn-primary">Area Personale</a>
                @elseif (Auth::user()->role === 'staff' || Auth::user()->role === 'admin')
                    <a href="{{ route('adminPanel') }}" class="btn btn-primary">Pannello di Controllo</a>
                @endif
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="btn btn-logout">Logout</button>
                    </form>
                @else

                <button onclick="window.location.href='{{ url('/register') }}'" class="btn btn-primary">Registrati</button>
                <button onclick="window.location.href='{{ url('/login') }}'" class="btn btn-primary">Login</button>
                {{-- <button @csrf onclick="window.location.href='{{ url('/logout') }}'" class="btn btn-danger">Logout</button> --}}

            @endif


            {{-- <button href="/logout" class="btn btn-logout">Logout</button> --}}

        </div>
      </div>
</nav>
