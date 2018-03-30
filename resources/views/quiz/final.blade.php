@extends('layouts.app')

@section('title')
  Quiz
@endsection

@section('content')
  <div class="section">
    <br>
    <div class="row">
      <div class="col s12 m10">
        <h3 class="light">Questionário Finalizado com Sucesso!</h3>
        <br><br>
        <form action="{{ route('feedback') }}" method="POST">
          {{ csrf_field() }}
          <h5>Dê uma nota para o site:</h5>
          <p>
            <label>
              <input name="nota" type="radio" value="0" required />
              <span>0</span>
            </label>
            <label>
              <input name="nota" type="radio" value="1" required/>
              <span>1</span>
            </label>
            <label>
              <input name="nota" type="radio" value="2" required/>
              <span>2</span>
            </label>
            <label>
              <input name="nota" type="radio" value="3" required />
              <span>3</span>
            </label>
            <label>
              <input name="nota" type="radio" value="4" required />
              <span>4</span>
            </label>
            <label>
              <input name="nota" type="radio" value="5" required />
              <span>5</span>
            </label>
          </p>
          <br>
          <h5>Deixe sua sugestão:</h5>
          <div class="row">
            <div class="input-field col s12">
              <textarea id="feedback" name="feedback" class="materialize-textarea" required></textarea>
              <label for="feedback">Feedback</label>
            </div>
          </div>
          <input class="btn btn-primary" type="submit" value="Enviar"/>
        </form>

      </div>
    </div>
    <br>
  </div>
@endsection
