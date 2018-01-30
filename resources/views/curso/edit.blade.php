@extends('layouts.app')

@section('title')
  Editar
@endsection

@section('content')
  <div class="section">
    <br>
    <div class="row">
      <form class="col s12" action="{{ route('curso.update', $curso->id) }}" method="POST">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT"/>
        <div class="row">
          <div class="input-field col s12 m6">
            <select id="diretoria_id" name="diretoria_id">
              <option value="" disabled>Escolha uma diretoria</option>
              @foreach ($diretorias as $diretoria)
                <option value="{{ $diretoria->id }}" {{ $diretoria->id == $curso->diretoria_id ? 'selected' : '' }} >{{ $diretoria->nome }}</option>
              @endforeach
            </select>
            <label>Diretoria</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m6">
            <input placeholder="Nome" value="{{ $curso->nome }}" id="nome" type="text" name="nome" />
            <label for="nome">Curso</label>
          </div>
        </div>
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
