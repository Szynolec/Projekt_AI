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
                  @foreach ($appointments as $appointment)
                  <tr>
                    <td>{{ $appointment->product->type }}</td>
                    <td>{{ $appointment->user->email }}</td>
                    <td>
                      <form action="{{ route('edit.update', $appointment->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ $appointment->date }}">
                    </td>
                    <td>
                      <input type="number" class="form-control @error('hour') is-invalid @enderror" name="hour" value="{{ $appointment->hour }}">
                    </td>
                    <td>
                      <button type="submit" class="btn btn-primary btn-block">Zapisz</button>
                      </form>
                      <form action="{{ route('edit.destroy', $appointment->id) }}" method="POST">
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

      <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h2>Edycja użytkowników</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Imię</th>
                                <th>Email</th>
                                <th>Nazwisko</th>
                                <th>Numer telefonu</th>
                                <th>Adres</th>
                                <th>Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>
                                    <form action="{{ route('edit.user.update', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                </td>
                                <td>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="phone_number" value="{{ $user->phone_number }}">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary btn-block">Zapisz</button>
                                    </form>
                                    <form action="{{ route('edit.user.destroy', $user->id) }}" method="POST">
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

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h2>Edycja produktów</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Typ</th>
                                <th>Obraz</th>
                                <th>Opis</th>
                                <th>Koszt</th>
                                <th>Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>
                                    <form action="{{ route('edit.product.update', $product->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" class="form-control" name="type" value="{{ $product->type }}">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="img" value="{{ $product->img }}">
                                </td>
                                <td>
                                    <textarea class="form-control" name="des">{{ $product->des }}</textarea>
                                </td>
                                <td>
                                    <input type="number" step="0.01" class="form-control" name="cost" value="{{ $product->cost }}">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary btn-block">Zapisz</button>
                                    </form>
                                    <form action="{{ route('edit.product.destroy', $product->id) }}" method="POST">
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

    <div class="container mt-4">
        <h2>Dodawania produktów</h2>
        <form action="{{ route('edit.product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
            <label for="type" class="form-label">Typ:</label>
            <input type="text" name="type" id="type" class="form-control" required>
            </div>
            <div class="mb-3">
            <label for="image" class="form-label">Obraz:</label>
            <input type="file" name="image" id="image" class="form-control" required>
            </div>
            <div class="mb-3">
            <label for="description" class="form-label">Opis:</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
            <label for="cost" class="form-label">Koszt:</label>
            <input type="number" name="cost" id="cost" step="0.01" class="form-control" required>
            </div>
            <div>
            <button type="submit" class="btn btn-primary">Dodaj produkt</button>
            </div>
        </form>
    </div>


    </body>

    </html>
