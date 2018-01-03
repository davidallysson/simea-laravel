<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

  @extends('layouts.head')

  <body>

    <nav class="top-nav">
      <div class="container">
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
      <div class="container">
        <div class="row">
          <div class="col s12 m10 offset-m1 l10 offset-l3">
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
