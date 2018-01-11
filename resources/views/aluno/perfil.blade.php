@extends('layouts.app')

@section('title')
  Aluno
@endsection

@section('content')
  <div class="section">
    <br>
    <div class="row">
      <div class="col s12 m10 offset-m1">
        <span><b>Nome:</b> {{ $aluno->nome }} </span><br>
        <span><b>Sexo:</b> {{ $aluno->sexo }} </span><br>
        <span><b>RG:</b> {{ $aluno->rg }} </span><br>
        <span><b>CPF:</b> {{ $aluno->cpf }} </span><br>
        <span><b>Matrícula:</b> {{ $aluno->matricula }} </span><br>
        <span><b>Telefone:</b> {{ $aluno->telefone }} </span><br>
        <span><b>Email:</b> {{ $aluno->user->email }} </span><br>
        <span><b>Data de Nascimento:</b> {{ $aluno->dataNascimento }} </span><br>
        <span><b>Estado Civil:</b> {{ $aluno->estadoCivil }} </span><br>
        <span><b>Etnia:</b> {{ $aluno->raca }} </span><br>
        @switch($aluno->renda)
          @case(1)
            <span><b>Renda Familiar: </b>Até um salário mínimo</span><br>
            @break
          @case(2)
            <span><b>Renda Familiar: </b>Dois salários mínimos</span><br>
            @break
          @case(3)
            <span><b>Renda Familiar: </b>Três salários mínimos</span><br>
            @break
          @case(4)
            <span><b>Renda Familiar: </b>Mais de quatro salários mínimos</span><br>
            @break
        @endswitch
        <span><b>Turma: </b> {{ $aluno->turma->nome }} </span><br>
        <br>
        <a href="{{ route('aluno.edit', $aluno->id) }}" class="btn btn-primary waves-effect waves-green">
          Editar
        </a>
      </div>
    </div>

  </div>
@endsection
