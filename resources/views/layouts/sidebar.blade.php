<a href="#" data-target="nav-mobile" class="top-nav sidenav-trigger full hide-on-large-only">
  <i class="material-icons">menu</i>
</a>
<ul id="nav-mobile" class="sidenav sidenav-fixed">
  <li class="bold">
    <div class="centralizar-logo">
      <img class="responsive-img" src="{{ asset('images/simea.jpg ')}}" alt="">
    </div>
  </li>

  @if(Auth::user())
    <li class="bold inverse">
      <i class="fas fa-inverse fa-user fa-lg" style="margin: 0 15px;"></i> {{ Auth::user()->name }}
    </li>
  @endif

  <li class="bold">
    <a href="{{ url('/') }}" class="waves-effect waves-green">
      <i class="fas fa-home fa-lg" style="margin: 0 15px;"></i> Home
    </a>
  </li>

  <li class="bold">
    <a href="{{ url('/sobre') }}" class="waves-effect waves-green">
      <i class="fas fa-question-circle fa-lg" style="margin: 0 15px;"></i> Sobre
    </a>
  </li>
  
  @guest
  <li class="bold">
    <a href="{{ route('login') }}" class="waves-effect waves-green">
      <i class="fas fa-sign-in-alt fa-lg" style="margin: 0 15px;"></i> Entrar
    </a>
  </li>

  <li class="bold">
    <a href="{{ route('register') }}" class="waves-effect waves-green">
      <i class="fas fa-sign-in-alt fa-lg" style="margin: 0 15px;"></i> Registrar-se
    </a>
  </li>
  @else
  <li class="bold">
    <a href="{{ route('logout') }}" class="waves-effect waves-green"
    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <i class="fas fa-sign-out-alt fa-lg" style="margin: 0 15px;"></i> Sair
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
  </li>
  @endguest

  @if(Auth::user() && Auth::user()->role=='aluno')
    <li class="bold">
      <a href="#quiz" class="waves-effect waves-green">
        <i class="far fa-edit fa-lg" style="margin: 0 15px;"></i> Quiz
      </a>
    </li>
  @endif

  @if(Auth::user() && Auth::user()->role=='administrador')
    <li class="no-padding">
      <ul class="collapsible collapsible-accordion">
        <li class="bold">
          <a class="collapsible-header waves-effect waves-green">
            <i class="far fa-edit fa-lg" style="margin: 0 15px;"></i> Cadastro
          </a>
          <div class="collapsible-body">
            <ul>
              <li><a href="#">Campus</a></li>
              <li><a href="#">Diretorias</a></li>
              <li><a href="#">Cursos</a></li>
              <li><a href="#">Turmas</a></li>
              <li><a href="#">Eixos</a></li>
              <li><a href="#">Alunos</a></li>
              <li><a href="#">Questões</a></li>
              <li><a href="#">Questionários</a></li>
            </ul>
          </div>
        </li>

        <li class="bold">
          <a class="collapsible-header waves-effect waves-green">
            <i class="far fa-chart-bar fa-lg" style="margin: 0 15px;"></i> Resultados
          </a>
          <div class="collapsible-body">
            <ul>
              <li><a href="#consultar">Consultar</a></li>
              <li><a href="#consultar">Comparar</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </li>
  @endif

</ul>

<div class="sidenav-footer-fixed hide-on-med-and-down">
  <div style="background-color: #666;">
    <div class="centralizar-logo-ifrn">
      <img class="responsive-img" src="{{ asset('images/ifrn2.png ')}}" alt="">
    </div>
  </div>
</div>
