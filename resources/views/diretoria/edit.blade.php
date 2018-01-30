@extends('layouts.app')

@section('title')
  Editar
@endsection

@section('content')
  <div class="section">
    <br>
    <div class="row">
      <form class="col s12" action="{{ route('diretoria.update', $diretoria->id) }}" method="POST">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT"/>
        <div class="row">
          <div class="input-field col s12 m6">
            <select id="campus_id" name="campus_id">
              <option value="" disabled>Escolha um campus</option>
              @foreach ($campuses as $campus)
                <option value="{{ $campus->id }}" {{ $campus->id == $diretoria->campus_id ? 'selected' : '' }}>{{ $campus->nome }}</option>
              @endforeach
            </select>
            <label>Campus</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m6">
            <input placeholder="Nome" value="{{ $diretoria->nome }}" id="nome" type="text" name="nome" />
            <label for="nome">Diretoria</label>
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
