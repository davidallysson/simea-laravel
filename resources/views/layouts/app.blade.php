<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMEA - Sistema de Monitoramento de Evasão Escolar</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

    <!-- Scripts -->
    <script src="{{ asset('js/fontawesome.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>

  </head>

  <body>

    <nav class="top-nav">
      <div class="container-fluid">
        <div class="nav-wrapper">
          <div class="row">
            <div class="col s12 m12 l7 offset-l3">
              <h1 class="header hide-on-med-and-down">@yield('title')</h1>
              <h1 class="header hide-on-large-only center">@yield('title')</h1>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <header>
      @extends('layouts.sidebar')
    </header>

    <main>
      <div class="container-fluid">
        <div class="row">
          <div class="col s12 m10 offset-m1 @yield('column', 'l9 offset-l3')">
            @yield('content')
          </div>
        </div>
      </div>
    </main>

    <footer class="page-footer" style="background-color: #666;">
      <div class="footer-copyright">
        <div class="container">
          <a class="grey-text text-lighten-4 right">© 2017-2018 SIMEA | Diretoria de Pesquisa e Inovação | IFRN Campus Natal-Central</a>
        </div>
      </div>
    </footer>

  </body>
</html>
