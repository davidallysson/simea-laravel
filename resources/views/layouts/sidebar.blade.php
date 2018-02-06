<a href="#" data-target="nav-mobile" class="top-nav sidenav-trigger full">
  <i class="material-icons">menu</i>
</a>
<ul id="nav-mobile" class="sidenav sidenav-fixed">
  <li class="bold">
    <div class="centralizar-logo">
      <img class="responsive-img" src="{{ asset('images/simea.jpg') }}" alt="">
    </div>
  </li>

  @if(Auth::user())
    <li class="bold inverse">
      <i class="fas fa-inverse fa-user fa-lg" style="margin: 0 15px;"></i> {{ Auth::user()->name }}
    </li>
  @endif

  <li class="bold">
    <a href="{{ route('home') }}" class="waves-effect waves-green">
      <i class="fas fa-home fa-lg" style="margin: 0 15px;"></i> Página Inicial
    </a>
  </li>

  @guest
    <li class="bold">
      <a href="{{ route('login') }}" class="waves-effect waves-green">
        <i class="fas fa-sign-in-alt fa-lg" style="margin: 0 15px;"></i> Entrar no Sistema
      </a>
    </li>

    <li class="bold">
      <a href="{{ route('aluno.create') }}" class="waves-effect waves-green">
        <i class="fas fa-user-plus fa-lg" style="margin: 0 15px;"></i> Registrar-se
      </a>
    </li>
  @else

  @if(Auth::user()->tipo_id==1)
    <li class="bold">
      <a href="{{ route('perfil') }}" class="waves-effect waves-green">
        <i class="fas fa-user fa-lg" style="margin: 0 15px;"></i> Meu Perfil
      </a>
    </li>

    <li class="bold">
      <a href="{{ route('vinculo.status') }}" class="waves-effect waves-green">
        <i class="far fa-edit fa-lg" style="margin: 0 15px;"></i> Questionário
      </a>
    </li>
  @endif

  @if(Auth::user()->tipo_id==2)
    <li class="no-padding">
      <ul class="collapsible collapsible-accordion">
        <li class="bold">
          <a class="collapsible-header waves-effect waves-green">
            <i class="far fa-edit fa-lg" style="margin: 0 15px;"></i> Cadastro
          </a>
          <div class="collapsible-body">
            <ul>
              <li><a href="{{ route('campus.index') }}">Campus</a></li>
              <li><a href="{{ route('diretoria.index') }}">Diretorias</a></li>
              <li><a href="{{ route('curso.index') }}">Cursos</a></li>
              <li><a href="{{ route('turma.index') }}">Turmas</a></li>
              <li><a href="{{ route('eixo.index') }}">Eixos</a></li>
              <li><a href="{{ route('aluno.index') }}">Alunos</a></li>
              <li><a href="{{ route('questao.index') }}">Questões</a></li>
              <li><a href="{{ route('questionario.index') }}">Questionários</a></li>
            </ul>
          </div>
        </li>

        <li class="bold">
          <a href="{{ route('consultar') }}" class="waves-effect waves-green">
            <i class="fas fa-chart-bar fa-lg" style="margin: 0 15px;"></i> Resultados
          </a>
        </li>

      </ul>
    </li>
  @endif
  @endguest

  @if(Auth::user())
    <li class="bold">
      <a href="{{ route('logout') }}" class="waves-effect waves-green"
      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt fa-lg" style="margin: 0 15px;"></i> Sair
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
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
