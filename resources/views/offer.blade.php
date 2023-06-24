<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/bootstrap.bundle.js"></script>
  <title>Oferta</title>
  <style>
    body {
      background-color: darkgray;
      color: white;
	  font-family: 'Arial', sans-serif;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-black">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/main">Strona Główna</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page">Oferta</a>
        </li>
        <li class="nav-item">
            @if (Auth::check())
              <!-- Jeśli użytkownik jest zalogowany -->
              @if (Auth::check() && Auth::user()->role == 'administrator')
              <a class="nav-link" href="/edit">Edytuj rezerwacje</a>
              @else
              <a class="nav-link" href="/appoitment">Umów się</a>
              @endif
            @else
              <!-- Jeśli użytkownik nie jest zalogowany -->
              <a class="nav-link" href="{{ route('login') }}">Umów się</a>
            @endif
          </li>
          <li class="nav-item">
            @if (Auth::check())
              <!-- Jeśli użytkownik jest zalogowany -->
              <a class="nav-link" href="{{ route('profile') }}">Profil</a>
            @endif
          </li>
        @if (Auth::check())
                <!-- Wyświetl link "Wyloguj się" -->
                <li class="nav-item">
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link">Wyloguj się</button>
                  </form>
                </li>
              @else
                <!-- Wyświetl link "Zaloguj się" -->
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Zaloguj się</a>
                </li>
              @endif
      </ul>
    </div>
  </div>
</nav>

@foreach($products as $product)
    <div class="card mt-3 bg-dark">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('img/' . $product->img) }}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->type }}</h5>
                    <p class="card-text">{{ $product->des }}</p>
                    <p class="card-text">Cena: {{ $product->cost }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach

</body>

</html>
