<nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">NoleggioAuto</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="nav-ul">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/catalogo">Catalogo Auto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/chi-siamo">chiSiamo</a>
            </li>
          </ul>
            <!-- <button href="{{url('/registrazione')}}" id="nav-registrazione" class="btn btn-outline-success" type="submit">Registrati</button> -->
            <button onclick="window.location.href='{{ url('/registrazione') }}'" class="btn btn-primary">Registrati</button>

            <!-- <button id="nav-login" class="btn btn-outline-success" type="submit">Login</button> -->
            <button onclick="window.location.href='{{ url('/login') }}'" class="btn btn-primary">Login</button>

            <button id="nav-logout" class="btn btn-outline-success" type="submit">Logout</button>   
        </div>
      </div>
</nav>
