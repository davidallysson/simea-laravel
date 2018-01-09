@extends('layouts.app')

@section('title')
  Cadastro
@endsection

@section('content')
<br>
<div class="container-fluid">
  <div class="row">
    <form class="col s12" method="POST" action="{{ route('register') }}">
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
      <input id='tipo_id' name="tipo_id" type="hidden" value="1" />
      <div class="row">
        <div class="input-field col s12">
          <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
      </div>
    </form>
  </div> <!-- row -->
</div> <!-- container -->
@endsection
