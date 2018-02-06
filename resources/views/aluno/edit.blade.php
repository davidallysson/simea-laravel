@extends('layouts.app')

@section('title')
  Editar
@endsection

@section('content')
  <div class="section">
    <br>
    <div class="row">
      <form class="col s12" action="{{ route('aluno.update', $aluno->id) }}" method="POST">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT"/>
        <div class="row">
          <div class="input-field col s12 m6 l4">
            <input placeholder="Nome" id="nome" type="text" name="nome" value="{{ $aluno->nome }}">
            <label for="nome">Nome</label>
          </div>

          <div class="input-field col s12 m6 l3">
            <input placeholder="20162014040003" id="matricula" type="text" name="matricula" value="{{ $aluno->matricula }}">
            <label for="matricula">Matricula</label>
          </div>

          <div class="input-field col s12 m6 l2">
            <input placeholder="000.000.000" id="rg" type="text" name="rg" value="{{ $aluno->rg }}">
            <label for="rg">RG</label>
          </div>

          <div class="input-field col s12 m6 l2">
            <input placeholder="000.000.000-00" id="cpf" type="text" name="cpf" value="{{ $aluno->cpf }}">
            <label for="cpf">CPF</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m4">
            <input id="email" type="email" name="email" placeholder="Email" value="{{ $aluno->user->email }}" required>
            <label for="email">Email</label>
          </div>

          <div class="input-field col s12 m6 l3">
            <select id="turma_id" name="turma_id">
              <option value="" disabled selected>Escolha uma opção</option>
              @foreach ($turmas as $turma)
                <option value="{{ $turma->id }}" {{ $turma->id == $aluno->turma_id ? 'selected' : '' }}>{{ $turma->nome }}</option>
              @endforeach
            </select>
            <label>Turma</label>
          </div>

          <div class="input-field col s12 m6 l2">
            <input placeholder="(99) 91234-5678" id="telefone" type="text" name="telefone" value="{{ $aluno->telefone }}">
            <label for="telefone">Telefone</label>
          </div>

          <div class="input-field col s12 m6 l2">
            <input class="datepicker" placeholder="1990-12-20" id="dataNascimento" type="text" name="dataNascimento" value="{{ $aluno->dataNascimento }}">
            <label for="dataNascimento">Data de Nascimento</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m6 l4">
            <select id="renda" name="renda">
              <option value="" disabled>Escolha uma opção</option>
              <option value="1" {{ $aluno->renda == 1 ? 'selected' : '' }}>Até um salário mínimo</option>
              <option value="2" {{ $aluno->renda == 2 ? 'selected' : '' }}>Dois salários mínimos</option>
              <option value="3" {{ $aluno->renda == 3 ? 'selected' : '' }}>Três salários mínimos</option>
              <option value="4" {{ $aluno->renda == 4 ? 'selected' : '' }}>Mais de quatro salários mínimos</option>
            </select>
            <label>Renda Familiar</label>
          </div>

          <div class="input-field col s12 m6 l3">
            <select id="raca" name="raca">
              <option value="" disabled>Escolha uma opção</option>
              <option value="Branco" {{ $aluno->raca == "Branco" ? 'selected' : '' }}>Branco</option>
              <option value="Preto" {{ $aluno->raca == "Preto" ? 'selected' : '' }}>Preto</option>
              <option value="Pardo" {{ $aluno->raca == "Pardo" ? 'selected' : '' }}>Pardo</option>
              <option value="Indígena" {{ $aluno->raca == "Indigena" ? 'selected' : '' }}>Indígena</option>
              <option value="Quilombola" {{ $aluno->raca == "Quilombola" ? 'selected' : '' }}>Quilombola</option>
            </select>
            <label>Raça</label>
          </div>

          <div class="input-field col s12 m6 l2">
            <select id="estadoCivil" name="estadoCivil">
              <option value="" disabled>Escolha uma opção</option>
              <option value="Solteiro" {{ $aluno->estadoCivil == "Solteiro" ? 'selected' : '' }}>Solteiro</option>
              <option value="Casado" {{ $aluno->estadoCivil == "Casado" ? 'selected' : '' }}>Casado</option>
              <option value="Divorciado" {{ $aluno->estadoCivil == "Divorciado" ? 'selected' : '' }}>Divorciado</option>
              <option value="Viúvo" {{ $aluno->estadoCivil == "Viuvo" ? 'selected' : '' }}>Viúvo</option>
            </select>
            <label>Estado Civil</label>
          </div>

          <div class="col s12 m6 l2 switch">
            <label>
              Inativo
              <input name="vinculo" type="checkbox" {{ $aluno->vinculo == 1 ? 'checked' : '' }}>
              <span class="lever"></span>
              Ativo
            </label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m3">
            <input id="password" type="password" name="old_password" placeholder="Senha Antiga" required>
            <label for="password">Senha Antiga</label>
          </div>
          <div class="input-field col s12 m3">
            <input id="password" type="password" name="password" placeholder="Nova Senha" required>
            <label for="password">Nova Senha</label>
          </div>
          <div class="input-field col s12 m3">
            <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirmar Nova Senha" required>
            <label for="password-confirm">Confirmar Senha</label>
          </div>
          <div class="col s12 m6 l2">
            <p>
              <label>
                <input id='masculino' name="sexo" type="radio" value="Masculino" {{ $aluno->sexo == "Masculino" ? 'checked' : '' }}/>
                <span>Masculino</span>
              </label>
              <label>
                <input id='feminino' name="sexo" type="radio" value="Feminino" {{ $aluno->sexo == "Feminino" ? 'checked' : '' }}/>
                <span>Feminino</span>
              </label>
            </p>
          </div>
          <input id='tipo_id' name="tipo_id" type="hidden" value="1" />
        </div>
        <div class="row">
          <div class="col s12 m6">
            <input class="btn btn-primary" type="submit" value="Editar"/>
          </div>
        </div>
      </form>
    </div>
    <br>
  </div>
@endsection
