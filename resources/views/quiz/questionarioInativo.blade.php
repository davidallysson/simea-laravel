@extends('layouts.app')

@section('title')
  Questionário
@endsection

@section('content')
<div class="section">
  <br>
  <div class="row">
    <div class="col s12 m10">
      <label>Olá, {{ Auth::user()->name }}. <br> Sentimos sua falta. <br> Gostaríamos de saber, dentre as alternativas abaixo, as ações que descrevem, da melhor maneira possível, a razão de sua desvinculação com o Instituto.</label><br>
      <form action="{{ route('quiz.resultadoInativo') }}" method="POST">
        {{ csrf_field() }}
        <p>
          <label>
            <input type="checkbox" name="motivos[]" value="Não era o curso que desejava"/>
            <span>Não era o curso que desejava</span>
          </label>
        </p>
        <p>
          <label>
            <input type="checkbox" name="motivos[]" value="Durante o curso me interessei por outra area"/>
            <span>Durante o curso me interessei por outra area</span>
          </label>
        </p>
        <p>
          <label>
            <input type="checkbox" name="motivos[]" value="Faltou-me incentivo familiar"/>
            <span>Faltou-me incentivo familiar</span>
          </label>
        </p>
        <p>
          <label>
            <input type="checkbox" name="motivos[]" value="Tive problemas familiares e acabei ficando desestimulado"/>
            <span>Tive problemas familiares e acabei ficando desestimulado</span>
          </label>
        </p>
        <p>
          <label>
            <input type="checkbox" name="motivos[]" value="Precisei optar entre trabalho e estudos"/>
            <span>Precisei optar entre trabalho e estudos</span>
          </label>
        </p>
        <p>
          <label>
            <input type="checkbox" name="motivos[]" value="Nao consegui nemhum auxilio economico"/>
            <span>Nao consegui nemhum auxilio economico</span>
          </label>
        </p>
        <p>
          <label>
            <input type="checkbox" name="motivos[]" value="Nao consegui acompanhar os conteudos devido a complexidade"/>
            <span>Nao consegui acompanhar os conteudos devido a complexidade</span>
          </label>
        </p>
        <p>
          <label>
            <input type="checkbox" name="motivos[]" value="A didatica dos professores me prejudicou academicamente"/>
            <span>A didatica dos professores me prejudicou academicamente</span>
          </label>
        </p>
        <p>
          <label>
            <input type="checkbox" name="motivos[]" value="Faltou-me perspectiva profissional"/>
            <span>Faltou-me perspectiva profissional</span>
          </label>
        </p>
        <p>
          <label>
            <input type="checkbox" name="motivos[]" value="Nao considerei lucrativa a area profissional referente ao curso"/>
            <span>Nao considerei lucrativa a area profissional referente ao curso</span>
          </label>
        </p>
        <p>
          <label>
            <input type="checkbox" name="motivos[]" value="Nao me identifiquei com a estrutura do Instituto"/>
            <span>Nao me identifiquei com a estrutura do Instituto</span>
          </label>
        </p>
        <p>
          <label>
            <input type="checkbox" name="motivos[]" value="Consegui ingressar em outra instituicao com melhor estrutura"/>
            <span>Consegui ingressar em outra instituicao com melhor estrutura</span>
          </label>
        </p>
        <div class="row">
          <div class="input-field col s12 m8">
            <textarea id="outro" name="outro" class="materialize-textarea"></textarea>
            <label for="outro">Outro</label>
          </div>
        </div>
        <br>
        <input class="btn btn-primary" type="submit" value="Enviar"/>
      </form>
    </div>
  </div>
  <br>
</div>
@endsection
