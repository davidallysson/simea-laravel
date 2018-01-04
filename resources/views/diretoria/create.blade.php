@extends('layouts.app')

@section('title')
  Cadastrar
@endsection

@section('content')
  <div class="section">
    <br>
    <div class="row">
      <form class="col s12" action="{{ route('diretoria.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
          <div class="input-field col s12 m6">
            <select id="campus_id" name="campus_id">
              <option value="" disabled selected>Escolha um campus</option>
              @foreach ($campuses as $campus)
                <option value="{{ $campus->id }}">{{ $campus->nome }}</option>
              @endforeach
            </select>
            <label>Campus</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m6">
            <input placeholder="Nome" id="nome" type="text" name="nome">
            <label for="nome">Diretoria</label>
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
