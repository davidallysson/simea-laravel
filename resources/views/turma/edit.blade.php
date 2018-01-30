@extends('layouts.app')

@section('title')
  Editar
@endsection

@section('content')
  <div class="section">
    <br>
    <div class="row">
      <form class="col s12" action="{{ route('turma.update', $turma->id) }}" method="POST">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT"/>
        <div class="row">
          <div class="input-field col s12 m6">
            <select id="curso_id" name="curso_id">
              <option value="" disabled>Escolha um curso</option>
              @foreach ($cursos as $curso)
                <option value="{{ $curso->id }}" {{ $curso->id == $turma->curso_id ? 'selected' : '' }} >{{ $curso->nome }}</option>
              @endforeach
            </select>
            <label>Curso</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m6">
            <input placeholder="Nome" value="{{ $turma->nome }}" id="nome" type="text" name="nome" />
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
