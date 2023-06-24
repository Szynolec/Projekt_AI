<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.css" rel="stylesheet">
  <script src="js/bootstrap.bundle.js"></script>
  <title>Umow</title>
  <style>
    body {
      background-color: darkgray;
      color: white;
      font-family: 'Arial', sans-serif;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/main">Strona Główna</a> <!-- Trasa do strony głównej -->
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('offer') }}">Oferta</a> <!-- Trasa do wyświetlania oferty -->
          </li>
        <li class="nav-item">
          <a class="nav-link active">Umów się</a>
        </li>
        <li class="nav-item">
            @if (Auth::check())
              <!-- Jeśli użytkownik jest zalogowany -->
              <a class="nav-link" href="{{ route('profile') }}">Profil</a>
            @endif
          </li>
          <li class="nav-item">
            @if (Auth::check())
              <!-- Jeśli użytkownik jest zalogowany -->
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link btn btn-link">Wyloguj się</button>
              </form>
              @else
              <!-- Jeśli użytkownik nie jest zalogowany -->
              <a class="nav-link" href="{{ route('login') }}">Zaloguj się</a>
            @endif
          </li>
      </ul>
    </div>
  </div>
</nav>

<div class="mt-5 bg-dark">
    <!-- Wyświetlanie godzin otwarcia -->
    <div class="text-center">
      <h5>Godziny otwarcia:</h5>
      <p>Poniedziałek - Piątek: 8:00 - 17:00</p>
      <p>Sobota - Niedziela: Zamknięte</p>
    </div>
</div>


<div class="container">
    <h2 class="mt-4 text-center">Umów wizytę u fotografa</h2>
    <form action="{{ route('appoitment') }}" method="POST" class="text-center">
        @csrf
        <div class="form-group">
            <label for="product">Produkt</label>
            <select class="form-control" id="product" name="type" required>
                <option value="">Wybierz produkt</option>
                <option value="Fotografia Rodzinna">Fotografia Rodzinna</option>
                <option value="Fotografia Portretowa">Fotografia Portretowa</option>
                <option value="Fotografia Modowa">Fotografia Modowa</option>
                <option value="Fotografia Do Dokumentów">Fotografia Do Dokumentów</option>
                <option value="Fotografia Czarno Biała">Fotografia Czarno Biała</option>
            </select>
            @error('type')
                <span class="text-danger">{{ $message }}</span> <!-- Wyświetlanie błędu dla pola "type" -->
            @enderror
        </div>
        <div class="form-group">
            <label for="date">Data</label>
            <input type="date" class="form-control" id="date" name="date" required>
            @error('date')
                <span class="text-danger">{{ $message }}</span> <!-- Wyświetlanie błędu dla pola "date" -->
            @enderror
        </div>
        <div class="form-group">
            <label for="hour">Godzina</label>
            <input type="number" class="form-control" id="hour" name="hour" min="8" max="16" step="1" required>
            @error('hour')
                  <span class="text-danger">{{ $message }}</span> <!-- Wyświetlanie błędu dla pola "hour" -->
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-5">Umów wizytę</button>
    </form>
</div>


</body>

</html>
