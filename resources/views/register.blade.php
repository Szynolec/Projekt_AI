<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/bootstrap.bundle.js"></script>
  <title>Rejestracja</title>
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
          <a class="nav-link" href="{{route('offer')}}">Oferta</a>
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
          <a class="nav-link active" aria-current="page" href="/login">Zaloguj Sie</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <div class="card bg-dark">
          <div class="card-header">
            <h5 class="card-title text-center">Rejestracja</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('register') }}" method="POST">
              @csrf

              <div class="mb-3">
                <label for="email" class="form-label">Adres email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Wprowadź adres email" required>
                @error('email')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Hasło:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Wprowadź hasło" required>
                @error('password')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="first_name" class="form-label">Imię:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Wprowadź imię" required>
                @error('first_name')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="last_name" class="form-label">Nazwisko:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Wprowadź nazwisko" required>
                @error('last_name')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="phone_number" class="form-label">Numer telefonu:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Wprowadź numer telefonu" required>
                @error('phone_number')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="address" class="form-label">Adres:</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Wprowadź adres" required>
                @error('address')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Zarejestruj się</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
