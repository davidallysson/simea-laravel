@extends('layouts.app')

@section('title')
  Turma
@endsection

@section('content')
  <div class="section">

    <div class="row">
      <div class="col s12">
        <table class="responsive-table striped">
          <thead>
            <tr>
                <th>Nome</th>
                <th>Curso</th>
                <th>Diretoria</th>
                <th>Ações</th>
            </tr>
          </thead>

          <tbody>
            @forelse ($turmas as $turma)
            <tr>
              <td>{{ $turma->nome }}</td>
              <td>{{ $turma->curso->nome }}</td>
              <td>{{ $turma->curso->diretoria->nome }}</td>
              <td>
                <a href="{{ route('turma.edit', $turma->id) }}" class="btn btn-flat waves-effect waves-green">
                  <i class="far fa-edit fa-lg"></i>
                </a>
                <a href="{{ route('turma.destroy', $turma->id) }}" class="btn btn-flat waves-effect waves-green"
                onclick="event.preventDefault(); document.getElementById('{{ $turma->id }}').submit();">
                  <i class="far fa-trash-alt fa-lg"></i>
                </a>

                <form id="{{ $turma->id }}" action="{{ route('turma.destroy', $turma->id) }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE"/>
                    <input class="btn btn-danger" type="submit" value="Delete"/>
                </form>
              </td>
            </tr>
            @empty
              <tr>
                <td>Não existem turmas cadastradas no sistema.</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            @endforelse
          </tbody>
        </table>
        <br>
        <a href="{{ route('turma.create') }}" class="btn btn-primary waves-effect waves-green">
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
