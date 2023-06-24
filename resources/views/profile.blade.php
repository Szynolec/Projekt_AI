<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/bootstrap.bundle.js"></script>
    <title>Profil</title>
	 <style>
    body {
      background-color: darkgray;
      color: white;
	  font-family: 'Arial', sans-serif;
    }
    .rounded-image {
  border-radius: 10%;
  overflow: hidden;
}
  </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/main">Strona Główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('offer') }}">Oferta</a>
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
                        <a class="nav-link active" aria-current="page">Profil</a>
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

      <style>
        body {
          color: black;
        }
      </style>
<div class="container ml-4 mt-5">
    <h2>Twoje wizyty</h2>
    @if ($appointments->count() == 0)
    <p>Brak zaplanowanych wizyt.</p>
    @else
    <div class="table-container">
      <table class="table table-bordered table-centered">
        <thead>
          <tr>
            <th>Typ</th>
            <th>Data</th>
            <th>Godzina</th>
            <th>Cena</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($appointments as $appointment)
          <tr>
            <td>{{ $appointment->product->type }}</td>
            <td>{{ $appointment->date }}</td>
            <td>{{ $appointment->hour }}</td>
            <td>{{ $appointment->product->cost }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif
  </div>

  <div class="container d-flex align-items-center justify-content-center mt-4">
    <div class="card mt-5 w-75">
      <div class="card-body py-2">
        <h2 class="text-center">Edytuj dane</h2>
        <form action="/update-user" method="POST" class="my-5" novalidate>
          @csrf
          @method('PUT')

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
              value="{{ Auth::user()->email }}" required>
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="name">Imię</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
              value="{{ Auth::user()->name }}" required>
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="last_name">Nazwisko</label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
              name="last_name" value="{{ Auth::user()->last_name }}" required>
            @error('last_name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="phone_number">Numer Telefonu</label>
            <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
              name="phone_number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="{{ Auth::user()->phone_number }}"
              required>
            @error('phone_number')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="address">Adres</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
              value="{{ Auth::user()->address }}" required>
            @error('address')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="current_password">Stare hasło</label>
            <input type="password" class="form-control @error('current_password') is-invalid @enderror"
              id="current_password" name="current_password" value="">
            @error('current_password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="new_password">Nowe hasło</label>
            <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password"
              name="new_password" value="">
            @error('new_password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary mt-3">Zmień</button>
          </div>
        </form>
      </div>
    </div>
  </div>




  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
