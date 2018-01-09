@extends('layouts.app')

@section('title')
  Editar
@endsection

@section('content')
  <div class="section">
    <br>
    <div class="row">
      <form class="col s12" action="{{ route('user.update', $user->id) }}" method="POST">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT"/>
        <div class="row">
          <div class="input-field col s12">
            <input id="name" type="text" name="name" placeholder="Nome" value="{{ $user->name }}" required>
            <label for="name">Nome</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="email" type="email" name="email" placeholder="Email" value="{{ $user->email }}" required>
            <label for="email">Email</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s4">
            <input id="password" type="password" name="old_password" placeholder="Senha Antiga" required>
            <label for="password">Senha Antiga</label>
          </div>
          <div class="input-field col s4">
            <input id="password" type="password" name="password" placeholder="Nova Senha" required>
            <label for="password">Nova Senha</label>
          </div>
          <div class="input-field col s4">
            <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirmar Nova Senha" required>
            <label for="password-confirm">Confirmar Senha</label>
          </div>
        </div>
        <div class="row">
          <div class="col s12">
            <p>
              <label>
                <input id='tipo_id_aluno' name="tipo_id" type="radio" value="1" {{ $user->tipo_id == 1 ? 'checked' : '' }} />
                <span>Aluno</span>
              </label>
              <label>
                <input id='tipo_id_adm' name="tipo_id" type="radio" value="2" {{ $user->tipo_id == 2 ? 'checked' : '' }} />
                <span>Administrador</span>
              </label>
            </p>
          </div>
        </div>
        <br>
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
