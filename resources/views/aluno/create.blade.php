@extends('layouts.app')

@section('title')
  Cadastrar
@endsection

@section('content')
  <div class="section">
    <br>
    <div class="row">
      <form class="col s12" action="{{ route('aluno.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
          <div class="input-field col s12 m6 l4">
            <input placeholder="Nome" id="nome" type="text" name="nome">
            <label for="nome">Nome</label>
          </div>

          <div class="input-field col s12 m6 l3">
            <input placeholder="20162014040003" id="matricula" type="text" name="matricula">
            <label for="matricula">Matricula</label>
          </div>

          <div class="input-field col s12 m6 l2">
            <input placeholder="000.000.000" id="rg" type="text" name="rg">
            <label for="rg">RG</label>
          </div>

          <div class="input-field col s12 m6 l2">
            <input placeholder="000.000.000-00" id="cpf" type="text" name="cpf">
            <label for="cpf">CPF</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m6 l4">
            <select id="estadoCivil" name="estadoCivil">
              <option value="" disabled selected>Escolha uma opção</option>
              <option value="Solteiro">Solteiro</option>
              <option value="Casado">Casado</option>
              <option value="Divorciado">Divorciado</option>
              <option value="Viúvo">Viúvo</option>
            </select>
            <label>Estado Civil</label>
          </div>

          <div class="input-field col s12 m6 l3">
            <select id="raca" name="raca">
              <option value="" disabled selected>Escolha uma opção</option>
              <option value="Branco">Branco</option>
              <option value="Preto">Preto</option>
              <option value="Pardo">Pardo</option>
              <option value="Indígena">Indígena</option>
              <option value="Quilombola">Quilombola</option>
            </select>
            <label>Raça</label>
          </div>

          <div class="input-field col s12 m6 l2">
            <input placeholder="(99) 91234-5678" id="telefone" type="text" name="telefone">
            <label for="telefone">Telefone</label>
          </div>

          <div class="input-field col s12 m6 l2">
            <input class="datepicker" placeholder="15/8/1990" id="dataNascimento" type="text" name="dataNascimento">
            <label for="dataNascimento">Data de Nascimento</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m6 l4">
            <select id="renda" name="renda">
              <option value="" disabled selected>Escolha uma opção</option>
              <option value="1">Até um salário mínimo</option>
              <option value="2">Dois salários mínimos</option>
              <option value="3">Três salários mínimos</option>
              <option value="4">Mais de quatro salários mínimos</option>
            </select>
            <label>Renda Familiar</label>
          </div>

          <div class="input-field col s12 m6 l4">
            <select id="turma_id" name="turma_id">
              <option value="" disabled selected>Escolha uma opção</option>
              @foreach ($turmas as $turma)
                <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
              @endforeach
            </select>
            <label>Turma</label>
          </div>

          <div class="col s12 m6 l2">
            <p>
              <label>
                <input id='masculino' name="sexo" type="radio" value="Masculino" />
                <span>Masculino</span>
              </label>
              <label>
                <input id='feminino' name="sexo" type="radio" value="Feminino" />
                <span>Feminino</span>
              </label>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col s12 m6">
            <input class="btn btn-primary" type="submit" value="Cadastrar"/>
          </div>
        </div>
      </form>
    </div>
    <br>
  </div>
@endsection
