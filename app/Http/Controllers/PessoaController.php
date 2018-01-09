<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PessoaController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('aluno.index', ['alunos' => Pessoa::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aluno.create', ['turmas' => Turma::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aluno = new Pessoa;
        $aluno->nome = $request->nome;
        $aluno->rg = $request->rg;
        $aluno->cpf = $request->cpf;
        $aluno->sexo = $request->sexo;
        $aluno->telefone = $request->telefone;
        $aluno->matricula = $request->matricula;
        $aluno->dataNascimento = $request->dataNascimento;
        $aluno->estadoCivil = $request->estadoCivil;
        $aluno->raca = $request->raca;
        $aluno->renda = $request->renda;
        $aluno->turma_id = $request->turma_id;

        $aluno->save();

        return Redirect::route('aluno.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return view('aluno.show', ['aluno' => Pessoa::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        return view('aluno.edit', ['aluno' => Pessoa::findOrFail($id)], ['turmas' => Turma::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $aluno = Pessoa::findOrFail($id);

        $aluno->nome = $request->nome;
        $aluno->rg = $request->rg;
        $aluno->cpf = $request->cpf;
        $aluno->sexo = $request->sexo;
        $aluno->telefone = $request->telefone;
        $aluno->matricula = $request->matricula;
        $aluno->dataNascimento = $request->dataNascimento;
        $aluno->estadoCivil = $request->estadoCivil;
        $aluno->raca = $request->raca;
        $aluno->renda = $request->renda;
        $aluno->turma_id = $request->turma_id;

        $aluno->save();

        return Redirect::route('aluno.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $aluno = Pessoa::findOrFail($id);
        $aluno->delete();

        return Redirect::route('aluno.index');
    }
}
