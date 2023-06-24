<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.css" rel="stylesheet">
  <script src="js/bootstrap.bundle.js"></script>
  <title>Edycja</title>
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
          <a class="nav-link active" aria-current="page">Edytuj Rezerwacje</a>
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

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <h2>Edycja zamówienia</h2>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Produkt</th>
                <th>Użytkownik</th>
                <th>Data zamówienia</th>
                <th>Godzina</th>
                <th>Akcje</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($appointment as $appointments)
              <tr>
                <td>{{ $appointments->product->type }}</td>
                <td>{{ $appointments->user->email }}</td>
                <td>
                  <form action="{{ route('appointment.update', $appointments->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ $appointments->date }}">
                </td>
                <td>
                  <input type="number" class="form-control @error('hour') is-invalid @enderror" name="hour" value="{{ $appointments->hour }}">
                </td>
                <td>
                  <button type="submit" class="btn btn-primary btn-block">Zapisz</button>
                  </form>
                  <form action="{{ route('appointment.destroy', $appointments->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-block">Usuń</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


</body>

</html>
