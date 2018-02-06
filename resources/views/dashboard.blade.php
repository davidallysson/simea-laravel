@extends('layouts.app')

@section('title')
  Página Inicial
@endsection

@section('content')
<div class="section">

  <div class="row">
    <div class="col s12 l4">
      <div class="icon-block">
        <h2 class="center" style="color: #008000;"><i class="material-icons small">flash_on</i></h2>
        <h5 class="center">Abordagem</h5>
        <p class="light">Coleta e apresenta dados provenientes de questionários, construídos a partir de eixos relacionados com a vida escolar e pessoal do aluno, reunindo informações dos alunos, turmas, diretorias e Campus, apontando os eixos que estão mais comprometidos e indicando se há índice particular de evasão ou não.</p>
      </div>
    </div>

    <div class="col s12 l4">
      <div class="icon-block">
        <h2 class="center" style="color: #008000;"><i class="material-icons small">group</i></h2>
        <h5 class="center">Público Alvo</h5>
        <p class="light">O SIMEA reúne informações e indicadores educacionais do IFRN e é feito para diferentes públicos como gestores, técnicos da secretaria, diretores escolares, professores mas, principalmente, para os alunos.</p>
      </div>
    </div>

    <div class="col s12 l4">
      <div class="icon-block">
        <h2 class="center" style="color: #008000;"><i class="material-icons small">settings</i></h2>
        <h5 class="center">Vantagens</h5>
        <p class="light">Permite a análise comparativa de um amplo conjunto de indicadores ao longo do tempo e, além de dados administrativos e de gestão da rede de ensino, é possível ter também indicadores de evasão (“evasômetros”), possibilitando o acompanhamento do processo permanência do aluno na instituição, bem como uma análise das causas particulares ou setoriais da possível evasão.</p>
      </div>
    </div>
  </div>

</div>
@endsection
