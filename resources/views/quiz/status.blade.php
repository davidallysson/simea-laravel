@extends('layouts.app')

@section('title')
  Vinculo
@endsection

@section('content')
  <div class="section">

    <div class="row">
      <div class="col s12">
        <br><br>
        <span>Antes de seguirmos no questionário, precisamos saber como está sua situação acadêmica:</span>
        <br><br>
        <form action="{{ route('vinculo.verificar') }}" method="POST">
          {{ csrf_field() }}
          <div class="row">
            <div class="input-field col s12 m6">
              <select id="vinculo" name="vinculo">
                <option value="" disabled selected>Escolha uma opção</option>
                <option value="1">Ativo - Cursando Regularmente</option>
                <option value="2">Inativo - Matrícula Trancada ou Desistência do Curso</option>
              </select>
              <label>Vinculo</label>
            </div>
          </div><div class="row">
            <div class="col s12 m6">
              <input class="btn btn-primary" type="submit" value="Continuar"/>
            </div>
          </div>

        </form>

      </div>
    </div>

  </div>
@endsection
