@extends('layouts.app')

@section('title')
  Cadastrar
@endsection

@section('content')
  <div class="section">
    <br>
    <div class="row">
      <form class="col s12" action="{{ route('curso.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
          <div class="input-field col s12 m6">
            <select id="diretoria_id" name="diretoria_id">
              <option value="" disabled selected>Escolha uma diretoria</option>
              @foreach ($diretorias as $diretoria)
                <option value="{{ $diretoria->id }}">{{ $diretoria->nome }}</option>
              @endforeach
            </select>
            <label>Diretoria</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m6">
            <input placeholder="Nome" id="nome" type="text" name="nome">
            <label for="nome">Curso</label>
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
