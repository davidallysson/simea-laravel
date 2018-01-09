@extends('layouts.app')

@section('title')
  Usuários
@endsection

@section('content')
  <div class="section">

    <div class="row">
      <div class="col s12">
        <table class="responsive-table striped">
          <thead>
            <tr>
                <th>Email</th>
                <th>Tipo de Usuario</th>
                <th>Ações</th>
            </tr>
          </thead>

          <tbody>
            @forelse ($users as $user)
            <tr>
              <td>{{ $user->email }}</td>
              <td>{{ $user->tipo_id == 1 ? 'Aluno' : 'Administrador' }}</td>
              <td>
                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-flat waves-effect waves-green">
                  <i class="far fa-edit fa-lg"></i>
                </a>
                <a href="{{ route('user.destroy', $user->id) }}" class="btn btn-flat waves-effect waves-green"
                onclick="event.preventDefault(); document.getElementById('{{ $user->id }}').submit();">
                  <i class="far fa-trash-alt fa-lg"></i>
                </a>

                <form id="{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE"/>
                    <input class="btn btn-danger" type="submit" value="Delete"/>
                </form>
              </td>
            </tr>
            @empty
              <tr>
                <td>Não existem usuários cadastrados no sistema.</td>
                <td></td>
                <td></td>
              </tr>
            @endforelse
          </tbody>
        </table>
        <br>
        <a href="{{ route('user.create') }}" class="btn btn-primary waves-effect waves-green">
          Cadastrar
        </a>
      </div>
    </div>

  </div>
@endsection
