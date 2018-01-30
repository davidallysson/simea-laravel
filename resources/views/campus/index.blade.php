@extends('layouts.app')

@section('title')
  Campus
@endsection

@section('content')

  <div class="section">

    <div class="row">
      <div class="col s12">
        <table class="responsive-table striped">
          <thead>
            <tr>
                <th style="width: 70%;">Nome</th>
                <th>Ações</th>
            </tr>
          </thead>

          <tbody>
            @forelse ($campuses as $campus)
            <tr>
              <td>{{ $campus->nome }}</td>
              <td>
                <a href="{{ route('campus.edit', $campus) }}" class="btn btn-flat waves-effect waves-green">
                  <i class="far fa-edit fa-lg"></i>
                </a>
                <a href="{{ route('campus.destroy', $campus) }}" class="btn btn-flat waves-effect waves-green"
                onclick="event.preventDefault(); document.getElementById('{{ $campus->id }}').submit();">
                  <i class="far fa-trash-alt fa-lg"></i>
                </a>

                <form id="{{ $campus->id }}" action="{{ route('campus.destroy', $campus) }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE"/>
                    <input class="btn btn-danger" type="submit" value="Delete"/>
                </form>
              </td>
            </tr>
            @empty
              <tr>
                <td>Não existem Campi cadastrados no sistema.</td>
                <td></td>
              </tr>
            @endforelse
          </tbody>
        </table>
        <br>
        <a href="{{ route('campus.create') }}" class="btn btn-primary waves-effect waves-green">
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
