@extends('layouts.app')

@section('title')
  Cadastrar
@endsection

@section('content')
  <div class="section">
    <br>
    <div class="row">
      <form class="col s12" action="{{ route('user.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
          <div class="input-field col s12">
            <input id="name" type="text" name="name" placeholder="Nome" required>
            <label for="name">Nome</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="email" type="email" name="email" placeholder="Email" required>
            <label for="email">Email</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="password" type="password" name="password" placeholder="Senha" required>
            <label for="password">Senha</label>
          </div>
          <div class="input-field col s6">
            <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirmar Senha" required>
            <label for="password-confirm">Confirmar Senha</label>
          </div>
        </div>
        <div class="row">
          <div class="col s12">
            <p>
              <label>
                <input id='tipo_id_aluno' name="tipo_id" type="radio" value="1" checked />
                <span>Aluno</span>
              </label>
              <label>
                <input id='tipo_id_adm' name="tipo_id" type="radio" value="2" />
                <span>Administrador</span>
              </label>
            </p>
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
