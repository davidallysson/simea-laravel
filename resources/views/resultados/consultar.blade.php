@extends('layouts.app')

@section('title')
  Consultar
@endsection

@section('content')
  <br>
  <div class="row">
    <form class="col s12" action="{{ route('consultarDados') }}" method="POST">
      {{ csrf_field() }}
      <p>
        <span><b>Pesquisar por: </b></span>
        <label>
          <input name="tipoPesquisa" value="campus" type="radio" required /> <span>Campus</span>
        </label>
        <label>
          <input name="tipoPesquisa" value="diretoria" type="radio" required /> <span>Diretoria</span>
        </label>
        <label>
          <input name="tipoPesquisa" value="curso" type="radio" required /> <span>Curso</span>
        </label>
        <label>
          <input name="tipoPesquisa" value="turma" type="radio" required /> <span>Turma</span>
        </label>
      </p>
      <br>
      <div class="row" id="select_campus" style="display: none;">
        <div class="input-field col s12 m10">
          <select id="campus_id" name="campus_id">
            <option value="" disabled selected>Escolha um campus</option>
            @foreach ($campuses as $campus)
              <option value="{{ $campus->id }}" >{{ $campus->nome }}</option>
            @endforeach
          </select>
          <label>Campus</label>
        </div>
      </div>
      <div class="row" id="select_diretoria" style="display: none;">
        <div class="input-field col s12 m10">
          <select id="diretoria_id" name="diretoria_id">
            <option value="" disabled selected>Escolha uma diretoria</option>
            @foreach ($diretorias as $diretoria)
              <option value="{{ $diretoria->id }}">{{ $diretoria->nome }}</option>
            @endforeach
          </select>
          <label>Diretoria</label>
        </div>
      </div>
      <div class="row" id="select_curso" style="display: none;">
        <div class="input-field col s12 m10">
          <select id="curso_id" name="curso_id">
            <option value="" disabled selected>Escolha um curso</option>
            @foreach ($cursos as $curso)
              <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
            @endforeach
          </select>
          <label>Curso</label>
        </div>
      </div>
      <div class="row" id="select_turma" style="display: none;">
        <div class="input-field col s12 m10">
          <select id="turma_id" name="turma_id">
            <option value="" disabled selected>Escolha uma turma</option>
            @foreach ($turmas as $turma)
            <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
            @endforeach
          </select>
          <label>Turma</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m6">
          <input class="btn btn-primary" type="submit" value="Consultar"/>
        </div>
      </div>
    </form>
  </div>

  <script>
      $('input:radio').change(function() {
        if( $('input[value=campus]').is(':checked') ) {
          $('#select_campus').show();
          $('#select_diretoria').hide();
          $('#select_curso').hide();
          $('#select_turma').hide();
          $('#campus_id').prop('required', true);
          $('#diretoria_id').prop('required', false);
          $('#curso_id').prop('required', false);
          $('#turma_id').prop('required', false);
        } else if ( $('input[value=diretoria]').is(':checked') ) {
          $('#select_campus').hide();
          $('#select_diretoria').show();
          $('#select_curso').hide();
          $('#select_turma').hide();
          $('#campus_id').prop('required', false);
          $('#diretoria_id').prop('required', true);
          $('#curso_id').prop('required', false);
          $('#turma_id').prop('required', false);
        } else if ( $('input[value=curso]').is(':checked') ) {
          $('#select_campus').hide();
          $('#select_diretoria').hide();
          $('#select_curso').show();
          $('#select_turma').hide();
          $('#campus_id').prop('required', false);
          $('#diretoria_id').prop('required', false);
          $('#curso_id').prop('required', true);
          $('#turma_id').prop('required', false);
        } else if ( $('input[value=turma]').is(':checked') ) {
          $('#select_campus').hide();
          $('#select_diretoria').hide();
          $('#select_curso').hide();
          $('#select_turma').show();
          $('#campus_id').prop('required', false);
          $('#diretoria_id').prop('required', false);
          $('#curso_id').prop('required', false);
          $('#turma_id').prop('required', true);
        }
      });
  </script>

  @if( !empty($msgErro) )
    <div class="row">
      <div class="col s12">
        <h4 class="header">{{ $msgErro }}</h4>
      </div>
    </div>
  @else
    <br>
    <div class="row">
      <div class="col s12">
        <div id="evasometro" style="height: 200px;"></div>
      </div>
    </div>
    <div class="row">
      <div class="col s12 m6">
        <div id="graficoRenda" style="height: 400px;"></div>
      </div>
      <div class="col s12 m6">
        <div id="graficoEstadoCivil" style="height: 400px;"></div>
      </div>
    </div>
    <div class="row">
      <div class="col s12 m6">
        <div id="graficoSexo" style="height: 400px;"></div>
      </div>
      <div class="col s12 m6">
        <div id="graficoEtnia" style="height: 400px;"></div>
      </div>
    </div>
    <div class="row">
      <div class="col s12">
        <div id="graficoIdade" style="height: 400px;"></div>
      </div>
    </div>
    <br>
  @endif
  <script type="text/javascript" src="{{ asset('js/graficos.js') }}"></script>
@endsection
