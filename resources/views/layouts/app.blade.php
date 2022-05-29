<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="enot" content="8181606752160pACub3PNaqfeAon48hFTEDJ8PHMklZAE" />
    <title>RealEdition</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

<!-- MY -->
<link href="css/app.css" rel="stylesheet" type="text/css">
<link href="css/custom.css" rel="stylesheet" type="text/css">
<script src="js/custom.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 {!! NoCaptcha::renderJs() !!}

</head>



<body>
  <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm" >
      <div class="container">
          <a class="navbar-brand text-light" href="{{ url('/') }}">
              RPS
          </a>
          <button class="navbar-toggler" type="button"  data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="/shop?tag=акции">{{ __('Магазин') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('auction') }}">{{ __('Аукцион игровой валюты') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('top') }}">{{ __('Топ 100') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('profile') }}">{{ __('Реферальная программа/Профиль') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="https://vk.com/realeditionrz">{{ __('Группа ВКонтакте') }}</a>
                </li>
              </ul>


              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->
                  @guest
                      <li class="nav-item">
                          <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Войти') }}</a>
                      </li>
                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                          </li>
                      @endif
                  @else
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item " href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Выйти') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </div>
                      </li>
                  @endguest
              </ul>
          </div>
      </div>
  </nav>
    <main role="main" id="main">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-dark text-white text-center text-lg-start">
          <!-- Grid container -->
          <div class="container">



          <!-- Copyright -->
          <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2021 Copyright:
          </div>

                                </div>
          <!-- Copyright -->
        </footer>
        <!-- Footer -->

</body>
</html>
