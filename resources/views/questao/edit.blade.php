@extends('layouts.app')

@section('title')
  Editar
@endsection

@section('content')
  <div class="section">
    <br>
    <div class="row">
      <form class="col s12" action="{{ route('questao.update', $questao->id) }}" method="POST">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT"/>
        <div class="row">
          <div class="input-field col s12 m6">
            <input placeholder="Titulo" id="titulo" value="{{ $questao->titulo }}" type="text" name="titulo">
            <label for="titulo">Questão</label>
          </div>

        </div>
        <div class="row">
          <div class="input-field col s12 m4">
            <select id="questionario_id" name="questionario_id">
              <option value="" disabled selected>Escolha um questionario</option>
              @foreach ($questionarios as $questionario)
                <option value="{{ $questionario->id }}" {{ $questionario->id == $questao->questionario_id ? 'selected' : '' }}>
                  {{ $questionario->titulo }}
                </option>
              @endforeach
            </select>
            <label>Questionario</label>
          </div>
        </div>
        @foreach ($questao->alternativas as $alternativa)
          @switch($alternativa->letra)
            @case('A')
              <div class="row">
                <div class="input-field col s12 m8">
                  <input placeholder="Alternativa" id="alternativa_a" value="{{ $alternativa->alternativa }}" type="text" name="alternativa_a">
                  <label for="alternativa_a">Alternativa A</label>
                </div>
              </div>
              @break
            @case('B')
              <div class="row">
                <div class="input-field col s12 m8">
                  <input placeholder="Alternativa" id="alternativa_b" value="{{ $alternativa->alternativa }}" type="text" name="alternativa_b">
                  <label for="alternativa_b">Alternativa B</label>
                </div>
              </div>
              @break
            @case('C')
              <div class="row">
                <div class="input-field col s12 m8">
                  <input placeholder="Alternativa" id="alternativa_c" value="{{ $alternativa->alternativa }}" type="text" name="alternativa_c">
                  <label for="alternativa_c">Alternativa C</label>
                </div>
              </div>
              @break
            @case('D')
              <div class="row">
                <div class="input-field col s12 m8">
                  <input placeholder="Alternativa" id="alternativa_d" value="{{ $alternativa->alternativa }}" type="text" name="alternativa_d">
                  <label for="alternativa_d">Alternativa D</label>
                </div>
              </div>
              @break
          @endswitch
        @endforeach
        <div class="row">
          <div class="col s12 m6">
            <input class="btn btn-primary" type="submit" value="Editar"/>
          </div>
        </div>
      </form>
    </div>
    <br>
  </div>
@endsection
