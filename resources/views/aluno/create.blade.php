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
            <input placeholder="Nome" id="nome" type="text" name="nome" required>
            <label for="nome">Nome</label>
          </div>

          <div class="input-field col s12 m6 l3">
            <input placeholder="20162014040003" id="matricula" type="text" name="matricula" required>
            <label for="matricula">Matricula</label>
          </div>

          <div class="input-field col s12 m6 l2">
            <input id="rg" class="rg" placeholder="000.000.000" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}" title="O formato deve ser '000.000.000'." type="text" name="rg" data-mask="000.000.000" data-mask-reverse="true" required>
            <label for="rg">RG</label>
          </div>

          <div class="input-field col s12 m6 l2">
            <input placeholder="000.000.000-00" id="cpf" type="text" name="cpf" class="cpf" required>
            <label for="cpf">CPF</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m4">
            <input id="email" type="email" name="email" placeholder="Email" required>
            <label for="email">Email</label>
          </div>

          <div class="input-field col s12 m6 l3">
            <select id="turma_id" name="turma_id" required>
              <option value="" disabled selected>Escolha uma opção</option>
              @foreach ($turmas as $turma)
                <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
              @endforeach
            </select>
            <label>Turma</label>
          </div>

          <div class="input-field col s12 m6 l2">
            <input id="telefone" type="text" name="telefone" class="phone" placeholder="(99) 91234-5678" required>
            <label for="telefone">Telefone</label>
          </div>

          <div class="input-field col s12 m6 l2">
            <input id="dataNascimento" class="date" type="text" name="dataNascimento" placeholder="DD/MM/AAAA" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}" title="O formato deve ser DD/MM/AAAA." required>
            <label for="dataNascimento">Data de Nascimento</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m6 l4">
            <select id="renda" name="renda" required>
              <option value="" disabled selected>Escolha uma opção</option>
              <option value="1">Até um salário mínimo</option>
              <option value="2">Dois salários mínimos</option>
              <option value="3">Três salários mínimos</option>
              <option value="4">Mais de quatro salários mínimos</option>
            </select>
            <label>Renda Familiar</label>
          </div>

          <div class="input-field col s12 m6 l3">
            <select id="raca" name="raca" required>
              <option value="" disabled selected>Escolha uma opção</option>
              <option value="Branco">Branco</option>
              <option value="Preto">Preto</option>
              <option value="Pardo">Pardo</option>
              <option value="Indigena">Indígena</option>
              <option value="Quilombola">Quilombola</option>
            </select>
            <label>Raça</label>
          </div>

          <div class="input-field col s12 m6 l4">
            <select id="estadoCivil" name="estadoCivil" required>
              <option value="" disabled selected>Escolha uma opção</option>
              <option value="Solteiro">Solteiro</option>
              <option value="Casado">Casado</option>
              <option value="Divorciado">Divorciado</option>
              <option value="Viuvo">Viúvo</option>
            </select>
            <label>Estado Civil</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m6 l4">
            <input id="password" type="password" name="password" placeholder="Senha" required>
            <label for="password">Senha</label>
          </div>
          <div class="input-field col s12 m6 l4">
            <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirmar Senha" required>
            <label for="password-confirm">Confirmar Senha</label>
          </div>

          <div class="col s12 m6 l2">
            <p>
              <label>
                <input id='masculino' name="sexo" type="radio" value="Masculino" required />
                <span>Masculino</span>
              </label>
              <label>
                <input id='feminino' name="sexo" type="radio" value="Feminino" required/>
                <span>Feminino</span>
              </label>
            </p>
          </div>

          <input id='tipo_id' name="tipo_id" type="hidden" value="1" />
        </div>
        <br>
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
