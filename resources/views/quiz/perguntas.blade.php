@extends('layouts.app')

@section('title')
  Quiz
@endsection

@section('content')
  <div class="section">
    <br>
    <div class="row">
      <div class="col s12 m8">
        <br>
        <form action="{{ route('quiz.resultado') }}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" name="questionario_id" value="{{ $questionario->id }}">
          <input type="hidden" name="resultado_id" value="{{ $resultado }}">

          @foreach ($questoes as $questao)
            <span><b>{{ $questao->titulo }}</b></span><br>
            <br>
            @foreach ($questao->alternativas as $alternativa)
              <span><b> &bull; </b> {{ $alternativa->alternativa }}</span><br>
              <p>
                <label>
                  <input name="alternativa{{ $loop->index }}" value="1" type="radio" required /> <span>1°</span>
                </label>
                <label>
                  <input name="alternativa{{ $loop->index }}" value="2" type="radio" required /> <span>2°</span>
                </label>
                <label>
                  <input name="alternativa{{ $loop->index }}" value="3" type="radio" required /> <span>3°</span>
                </label>
                <label>
                  <input name="alternativa{{ $loop->index }}" value="4" type="radio" required /> <span>4°</span>
                </label>
              </p>
            @endforeach
            <br>
          @endforeach
          @if($questoes->hasMorePages())
            <input type="hidden" name="next_url" value="{{ $questoes->nextPageUrl() }}">
          @else
            <input type="hidden" name="next_url" value="/quiz/final">
          @endif
          <input class="btn btn-primary" type="submit" value="Continuar"/>
        </form>
      </div>
      <div class="col s12 m3">
        <br><br><br><br>
        <b><p>As perguntas devem ser respondidas por ordem de prioridade. Selecione "4" para a primeira opção que você escolheria como resposta, "3" para a segunda opção que você escolheria como resposta, "2" para a terceira opção que você escolheria como resposta e "1" para a última opção que você escolheria.</p></b>
      </div>
    </div>
    <br>
  </div>

  <script>
    $("input[value=1]").change(function() {
      $('input[value=1]').not(this).prop('checked', false);
    });
    $("input[value=2]").change(function() {
      $('input[value=2]').not(this).prop('checked', false);
    });
    $("input[value=3]").change(function() {
      $('input[value=3]').not(this).prop('checked', false);
    });
    $("input[value=4]").change(function() {
      $('input[value=4]').not(this).prop('checked', false);
    });
  </script>
@endsection
