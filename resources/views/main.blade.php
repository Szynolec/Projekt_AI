<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/bootstrap.bundle.js"></script>
    <title>Strona Główna</title>
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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Strona Główna</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#fotografowie">Fotografowie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#sprzet">Sprzęt</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#zdjecia">Przykłady Zdjęć</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#kontakt">Kontakt</a>
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

  <header class="jumbotron jumbotron-fluid custom-jumbotron">

</header>

<style>
.custom-jumbotron {
  padding-top: 10rem;
  padding-bottom: 10rem;
  background-image: url(img/logo.jpg);
  background-size: 100% 100%;
  background-position: center;
}
</style>

@if(session('success_message'))
    <div class="alert alert-success">
        {{ session('success_message') }}
        <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('login') }}'">OK</button>
    </div>
@endif

  <div class="col">
      <h2 class="text-center bg-dark text-light p-2">O Naszej Firmie</h2>
    </div>
  <div class="container mt-5 mb-5">
  <div class="row align-items-center">
      <p class="text-center">Nasza firma fotograficzna to zespół pasjonatów, którzy specjalizują się w tworzeniu wyjątkowych i niezapomnianych obrazów. Jesteśmy zauroczeni sztuką fotografii i jesteśmy dumni z możliwości uchwycenia chwil, emocji i piękna w naszych zdjęciach.
Działamy na rynku od wielu lat i zdobyliśmy szerokie doświadczenie w różnorodnych dziedzinach fotografii. Oferujemy usługi fotograficzne na różne okazje, takie jak sesje portretowe, śluby, wydarzenia rodzinne, sesje w plenerze oraz wiele innych. Naszym celem jest zawsze zapewnienie naszym klientom wyjątkowych i profesjonalnych fotografii, które będą trwałą pamiątką.
Nasz zespół składa się z utalentowanych i kreatywnych fotografów, którzy posiadają nie tylko umiejętności techniczne, ale również artystyczne spojrzenie na świat. Współpracujemy z najnowszym sprzętem fotograficznym i wykorzystujemy nowoczesne techniki, aby zapewnić wysoką jakość naszych zdjęć.
Nie tylko uchwycamy piękno, ale także tworzymy historie poprzez nasze obrazy. Każda sesja fotograficzna jest dla nas wyjątkowa i staramy się ukazać indywidualność każdej osoby i chwili. Dążymy do tego, aby nasi klienci czuli się komfortowo i swobodnie podczas sesji, co pomaga nam uwiecznić ich naturalne piękno i autentyczne emocje.
Zapraszamy do zapoznania się z naszym portfolio, aby zobaczyć nasze dotychczasowe prace. Jeśli poszukujesz profesjonalnego fotografa, który zatrzyma niezapomniane momenty Twojego życia, to jesteśmy gotowi uwiecznić je dla Ciebie. Skontaktuj się z nami, aby omówić swoje potrzeby fotograficzne i stworzyć razem niepowtarzalne wspomnienia.</p>
    </div>

</div>

<div id="fotografowie" class="col">
      <h2 class="text-center bg-dark text-light p-2">Nasi Fotografowie</h2>
    </div>
    <section class="photographer-section p-4">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6">
              <img src="img/fotograf.jpg" class="img-fluid rounded-image" alt="Fotograf">
            </div>
            <div class="col-md-6">
              <h2 class="text-md-center">Adam Pietrzak</h2>
              <p class="text-md-center">Jesteśmy dumni z naszego utalentowanego i kreatywnego fotografa, który oddaje swoje serce i duszę w każdej sesji fotograficznej. Z pasją uchwyci piękno i emocje w niezapomnianych obrazach</p>
              <p class="text-md-center">Specjalizuje się w:</p>
              <ul class="text-md-center list-unstyled">
                <li>Sesjach portretowych</li>
                <li>Wydarzeniach rodzinnych</li>
                <li>Fotografii krajobrazowej</li>
              </ul>
              <p class="text-md-center">Zapraszamy do skorzystania z usług naszego fotografa, aby uwiecznić ważne chwile i stworzyć piękne wspomnienia</p>
            </div>
          </div>
        </div>
      </section>

<section class="photographer-section p-4">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 order-md-last">
        <img src="img/fotograf2.jpg" class="img-fluid float-right rounded-image" alt="Fotograf">
      </div>
      <div class="col-md-6">
        <h2 class="text-md-center">Jan Mazur</h2>
        <p class="text-md-center">Jesteśmy dumni z naszego utalentowanego i kreatywnego fotografa, który oddaje swoje serce i duszę w każdej sesji fotograficznej. Z pasją uchwyci piękno i emocje w niezapomnianych obrazach.</p>
        <p class="text-md-center">Specjalizuje się w:</p>
        <ul class="text-md-center  list-unstyled">
          <li>Sesjach portretowych</li>
          <li>Wydarzeniach rodzinnych</li>
          <li>Sesjach w plenerze</li>
        </ul>
        <p class="text-md-center">Zapraszamy do skorzystania z usług naszego fotografa, aby uwiecznić ważne chwile i stworzyć piękne wspomnienia.</p>
      </div>
    </div>
  </div>
</section>

  <div class="col" id="sprzet">
      <h2 class="text-center bg-dark text-light p-2">Sprzęt</h2>
    </div>
 <section class="equipment-section">
  <div class="container mt-5 mb-4">
    <div class="row">
      <div class="col-md-6">
        <h3>Kamery</h3>
        <ul>
          <li class="mb-4">Kamera Sony Alpha A7 III - Sony Alpha A7 III to pełnoklatkowy bezlusterkowiec o doskonałej jakości obrazu i wszechstronnych możliwościach. Wyposażony w 24,2-megapikselową matrycę Exmor R CMOS oraz zaawansowany system autofokusu, umożliwia rejestrowanie wyjątkowych detali i ostrości w każdej sytuacji. Dodatkowo, posiada wbudowany stabilizator obrazu oraz możliwość nagrywania wideo w jakości 4K.</li>
          <li class="mb-4">Kamera Canon EOS 5D Mark IV - Canon EOS 5D Mark IV to profesjonalna lustrzanka cyfrowa z matrycą pełnoklatkową o rozdzielczości 30,4 megapikseli. Dzięki zaawansowanemu procesorowi obrazu DIGIC 6+ oraz szerokiemu zakresowi czułości ISO, kamera oferuje wyjątkową jakość obrazu nawet przy słabym oświetleniu. Dodatkowo, posiada zaawansowany system autofokusu Dual Pixel CMOS, umożliwiający precyzyjne śledzenie i ostrość w trybie Live View oraz podczas nagrywania wideo.</li>
          <li>Kamera Nikon Z7 II -  Nikon Z7 II to zaawansowany bezlusterkowiec wyposażony w matrycę pełnoklatkową o rozdzielczości 45,7 megapiksela. Posiada rozbudowany system autofokusu oraz 5-osiowy stabilizator obrazu, co pozwala na uzyskanie ostrych i stabilnych zdjęć. Kamera oferuje także szybki czas reakcji, wysoką jakość nagrywania wideo 4K oraz możliwość korzystania z szerokiego zakresu obiektywów systemu Z firmy Nikon..</li>
        </ul>
      </div>
      <div class="col-md-6">
        <h3>Aparaty</h3>
        <ul>
          <li class="mb-4">Aparat Nikon D850 - Nikon D850 to pełnoklatkowy aparat lustrzankowy, który zapewnia doskonałą jakość obrazu i wszechstronne możliwości. Wyposażony w matrycę o rozdzielczości 45,7 megapikseli, oferuje niezwykłą ostrość, szczegółowość i dynamiczny zakres. Posiada zaawansowany system autofokusu, szybki burst mode, wbudowany stabilizator obrazu oraz możliwość nagrywania wideo w jakości 4K.</li>
          <li class="mb-4">Aparat Sony Alpha A7R IV - Sony Alpha A7R IV to pełnoklatkowy bezlusterkowiec, który wyróżnia się wysoką rozdzielczością i niezwykłą jakością obrazu. Z matrycą o rozdzielczości 61 megapikseli i zaawansowanym systemem autofokusu, umożliwia rejestrowanie niesamowitych detali i ostrości. Posiada również wbudowany stabilizator obrazu, szybki burst mode i nagrywanie wideo w jakości 4K.</li>
          <li class="mb-4">Aparat Canon EOS 5D Mark IV - Canon EOS 5D Mark IV to zaawansowany aparat lustrzankowy, który oferuje doskonałą jakość obrazu i profesjonalne możliwości. Wyposażony w matrycę o rozdzielczości 30,4 megapikseli, zapewnia wyraziste i szczegółowe zdjęcia. Posiada zaawansowany system autofokusu, duży zakres czułości ISO, szybki burst mode oraz nagrywanie wideo w jakości 4K.</li>
          <li class="mb-4">Aparat Fujifilm X-T4 - Fujifilm X-T4 to zaawansowany aparat bezlusterkowy, który oferuje doskonałą jakość obrazu i unikalny design. Wyposażony w matrycę X-Trans CMOS IV o rozdzielczości 26,1 megapikseli, zapewnia wyjątkową ostrość i reprodukcję kolorów charakterystyczną dla aparatów Fujifilm. Posiada zaawansowany system autofokusu, stabilizację obrazu, duży wizjer elektroniczny i nagrywanie wideo w jakości 4K.</li>
        </ul>
      </div>
    </div>
  </div>
</section>



 <style>
  .img-thumbnail {
    transition: transform 0.2s ease;
  }

  .img-thumbnail:hover {
    transform: scale(1.50);
  }
</style>

<div class="col" id="zdjecia">
      <h2 class="text-center bg-dark text-light p-2">Przykładowe Zdjęcia Naszych Fotografów</h2>
    </div>
<div class="container mt-5 mb-4">
  <div class="row">
    <div class="col-md-3">
      <img src="img/portfolio1.jpg" class="img-fluid img-thumbnail" alt="Zdjęcie 1">
    </div>
    <div class="col-md-3">
      <img src="img/portfolio2.jpg" class="img-fluid img-thumbnail" alt="Zdjęcie 2">
    </div>
    <div class="col-md-3">
      <img src="img/portfolio3.jpg" class="img-fluid img-thumbnail" alt="Zdjęcie 3">
    </div>
    <div class="col-md-3">
      <img src="img/portfolio4.jpg" class="img-fluid img-thumbnail" alt="Zdjęcie 4">
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-md-3">
      <img src="img/portfolio5.jpg" class="img-fluid img-thumbnail" alt="Zdjęcie 5">
    </div>
    <div class="col-md-3">
      <img src="img/portfolio6.jpg" class="img-fluid img-thumbnail" alt="Zdjęcie 6">
    </div>
    <div class="col-md-3">
      <img src="img/portfolio7.jpg" class="img-fluid img-thumbnail" alt="Zdjęcie 7">
    </div>
    <div class="col-md-3">
      <img src="img/portfolio8.jpg" class="img-fluid img-thumbnail" alt="Zdjęcie 8">
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-md-3">
      <img src="img/portfolio9.jpg" class="img-fluid img-thumbnail" alt="Zdjęcie 5">
    </div>
    <div class="col-md-3">
      <img src="img/portfolio10.jpg" class="img-fluid img-thumbnail" alt="Zdjęcie 6">
    </div>
    <div class="col-md-3">
      <img src="img/portfolio11.jpg" class="img-fluid img-thumbnail" alt="Zdjęcie 7">
    </div>
    <div class="col-md-3">
      <img src="img/portfolio12.jpg" class="img-fluid img-thumbnail" alt="Zdjęcie 8">
    </div>
  </div>
</div>


<section class="contact-section bg-dark text-light p-4">
    <div class="contact-info mt-4 text-center">
        <h2 id="kontakt">Kontakt</h2>
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-left">Placówka</h4>
                <img src="img/placowka.jpg" alt="Zdjęcie placówki" class="img-fluid float-left mr-4">
                <p>Rzeszów ulica Hetmańska 20</p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div>
                    <h4 class="text-left">Dane kontaktowe</h4>
                    <p>Numer telefonu: 123-456-789</p>
                    <p>Adres e-mail: example@example.com</p>
                </div>
            </div>
        </div>
    </div>


  <footer class="bg-dark text-white text-center py-4">
    <div class="container">
      <p>Witryna Fotografii &copy; 2023</p>
    </div>
  </footer>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
