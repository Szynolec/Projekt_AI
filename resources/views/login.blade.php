<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/bootstrap.bundle.js"></script>
  <title>Logowanie</title>
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


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success_message'))
    <div class="alert alert-success">
        {{ session('success_message') }}
        <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('login') }}'">OK</button>
    </div>
@endif


<section class="vh-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->has('login'))
            <div class="alert alert-danger">
                {{ $errors->first('login') }}
            </div>
        @endif
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <h1 class="text-center">Panel logowania</h1>
            <br><br>
            <form method="POST" action="{{ route('login.submit') }}">@csrf
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="email" name="email" class="form-control form-control-lg" />
                <label class="form-label" for="email">Email</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="password" name="password" class="form-control form-control-lg" />
                <label class="form-label" for="password">Hasło</label>
              </div>

              <div class="d-flex justify-content-around align-items-center mb-4">
                <p>Nie masz jeszcze konta? <a href="{{ route('register') }}">Zarejestruj się!</a></p>
              </div>

              <!-- Submit button -->
              <div class="d-flex justify-content-around align-items-center" >
                <button type="submit" class="btn btn-primary btn-lg btn-block">Zaloguj!</button>
              </div>
            </form>

        </div>
    </div>

</section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
