@extends('layouts.app')

@section('title')
  Cadastrar
@endsection

@section('content')
  <div class="section">
    <br>
    <div class="row">
      <form class="col s12" action="{{ route('questionario.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
          <div class="input-field col s12 m6">
            <input placeholder="Titulo" id="titulo" type="text" name="titulo">
            <label for="titulo">Questionario</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m6">
            <select id="eixo_id" name="eixo_id">
              <option value="" disabled selected>Escolha uma opção</option>
              @foreach ($eixos as $eixo)
                <option value="{{ $eixo->id }}">{{ $eixo->nome }}</option>
              @endforeach
            </select>
            <label>Eixo</label>
          </div>
        </div>
        <div class="row">
          <div class="col s12 m6">
            <div class="switch">
              <label>
                Indisponível
                <input id="disponivel" type="checkbox" name="disponivel">
                <span class="lever"></span>
                Disponível
              </label>
            </div>
          </div>
        </div>
        <br>
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
