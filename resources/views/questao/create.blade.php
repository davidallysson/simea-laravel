@extends('layouts.app')

@section('title')
  Cadastrar
@endsection

@section('content')
  <div class="section">
    <br>
    <div class="row">
      <form class="col s12" action="{{ route('questao.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
          <div class="input-field col s12 m6">
            <input placeholder="Titulo" id="titulo" type="text" name="titulo">
            <label for="titulo">Questão</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m4">
            <select id="questionario_id" name="questionario_id">
              <option value="" disabled selected>Escolha um questionario</option>
              @foreach ($questionarios as $questionario)
                <option value="{{ $questionario->id }}">{{ $questionario->titulo }}</option>
              @endforeach
            </select>
            <label>Questionario</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m8">
            <input placeholder="Alternativa" id="alternativa_a" type="text" name="alternativa_a">
            <label for="alternativa_a">Alternativa A</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m8">
            <input placeholder="Alternativa" id="alternativa_b" type="text" name="alternativa_b">
            <label for="alternativa_b">Alternativa B</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m8">
            <input placeholder="Alternativa" id="alternativa_c" type="text" name="alternativa_c">
            <label for="alternativa_c">Alternativa C</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m8">
            <input placeholder="Alternativa" id="alternativa_d" type="text" name="alternativa_d">
            <label for="alternativa_d">Alternativa D</label>
          </div>
        </div>
        <div class="row">
          <div class="col s12 m6">
            <input class="btn btn-primary" type="submit" value="Cadastrar"/>
          </div>
        </div>
      </form>
    </div>
    <br>
  </div>
@endsection
