@extends('layouts.app')

@section('title')
  Questão
@endsection

@section('content')
  <div class="section">
    <br>
    <div class="row">
      <div class="col s12 m10 offset-m1">
        <span><b>Questionario:</b> {{ $questao->questionario->titulo }} </span><br>
        <span><b>Eixo:</b> {{ $questao->questionario->eixo->nome }} </span><br>
        <span><b>Titulo:</b> {{ $questao->titulo }} </span><br>
        @foreach ($questao->alternativas as $alternativa)
          @switch($alternativa->letra)
            @case('A')
              <span><b> A): </b> {{ $alternativa->alternativa }} </span><br>
              @break
            @case('B')
              <span><b> B): </b> {{ $alternativa->alternativa }} </span><br>
              @break
            @case('C')
              <span><b> C): </b> {{ $alternativa->alternativa }} </span><br>
              @break
            @case('D')
              <span><b> D): </b> {{ $alternativa->alternativa }} </span><br>
              @break
          @endswitch
        @endforeach
      </div>
    </div>
    <br>
  </div>
@endsection
