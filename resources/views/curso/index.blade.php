@extends('layouts.app')

@section('title')
  Curso
@endsection

@section('content')
  <div class="section">

    <div class="row">
      <div class="col s12">
        <table class="responsive-table striped">
          <thead>
            <tr>
                <th style="width: 40%;">Nome</th>
                <th>Diretoria</th>
                <th>Campus</th>
                <th>Ações</th>
            </tr>
          </thead>

          <tbody>
            @forelse ($cursos as $curso)
            <tr>
              <td>{{ $curso->nome }}</td>
              <td>{{ $curso->diretoria->nome }}</td>
              <td>{{ $curso->diretoria->campus->nome }}</td>
              <td>
                <a href="{{ route('curso.edit', $curso->id) }}" class="btn btn-flat waves-effect waves-green">
                  <i class="far fa-edit fa-lg"></i>
                </a>
                <a href="{{ route('curso.destroy', $curso->id) }}" class="btn btn-flat waves-effect waves-green"
                onclick="event.preventDefault(); document.getElementById('{{ $curso->id }}').submit();">
                  <i class="far fa-trash-alt fa-lg"></i>
                </a>

                <form id="{{ $curso->id }}" action="{{ route('curso.destroy', $curso->id) }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE"/>
                    <input class="btn btn-danger" type="submit" value="Delete"/>
                </form>
              </td>
            </tr>
            @empty
              <tr>
                <td>Não existem cursos cadastrados no sistema.</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            @endforelse
          </tbody>
        </table>
        <br>
        <a href="{{ route('curso.create') }}" class="btn btn-primary waves-effect waves-green">
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
