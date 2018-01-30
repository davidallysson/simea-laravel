@extends('layouts.app')

@section('title')
  Alunos
@endsection

@section('content')
  <div class="section">

    <div class="row">
      <div class="col s12">
        <table class="responsive-table striped">
          <thead>
            <tr>
                <th>Nome</th>
                <th>Matricula</th>
                <th>RG</th>
                <th>CPF</th>
                <th>Ações</th>
            </tr>
          </thead>

          <tbody>
            @forelse ($alunos as $aluno)
            <tr>
              <td>{{ $aluno->nome }}</td>
              <td>{{ $aluno->matricula }}</td>
              <td>{{ $aluno->rg }}</td>
              <td>{{ $aluno->cpf }}</td>
              <td>
                <a href="{{ route('aluno.show', $aluno->id) }}" class="btn btn-flat waves-effect waves-green">
                  <i class="fas fa-eye fa-lg"></i>
                </a>
                <a href="{{ route('aluno.edit', $aluno->id) }}" class="btn btn-flat waves-effect waves-green">
                  <i class="far fa-edit fa-lg"></i>
                </a>
                <a href="{{ route('aluno.destroy', $aluno->id) }}" class="btn btn-flat waves-effect waves-green"
                onclick="event.preventDefault(); document.getElementById('{{ $aluno->id }}').submit();">
                  <i class="far fa-trash-alt fa-lg"></i>
                </a>

                <form id="{{ $aluno->id }}" action="{{ route('aluno.destroy', $aluno->id) }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE"/>
                    <input class="btn btn-danger" type="submit" value="Delete"/>
                </form>
              </td>
            </tr>
            @empty
              <tr>
                <td>Não existem alunos cadastrados no sistema.</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            @endforelse
          </tbody>
        </table>
        <br>
        <a href="{{ route('aluno.create') }}" class="btn btn-primary waves-effect waves-green">
          Cadastrar
        </a>
      </div>
    </div>

  </div>

  @if(session('status'))
    <script type="text/javascript">
      $(document).ready(function(){
        M.toast({html: ' <?= session('status') ?> '});
      });
    </script>
  @endif
  
@endsection
