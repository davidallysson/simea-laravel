@extends('layouts.app')

@section('title')
  Escolher Questionario
@endsection

@section('content')
  <div class="section">
    <div class="row">
      <div class="col s12">
        <table class="responsive-table striped">
          <thead>
            <tr>
                <th>Titulo</th>
                <th>Ações</th>
            </tr>
          </thead>

          <tbody>
            @forelse ($questionarios as $questionario)
            <tr>
              <td>{{ $questionario->titulo }}</td>
              @if ( $resultados->contains('questionario_id', $questionario->id) )
                <td>Você já respondeu a este questionário.</td>
              @elseif ( $questionario->questoes->isEmpty() )
                <td>Este questionário está vazio.</td>
              @else
                <td>
                  <a href="{{ route('quiz.iniciar', $questionario->id) }}">Iniciar Questionario</a>
                </td>
              @endif
            </tr>
            @empty
              <tr>
                <td>Não existem questionários disponíveis.</td>
                <td></td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </div>
@endsection
