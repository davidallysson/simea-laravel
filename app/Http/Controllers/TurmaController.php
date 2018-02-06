<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

class TurmaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next) {
          $this->usuario = auth()->user();

          if($this->usuario->tipo_id == 2) {
            return $next($request);
          } else {
            return redirect('board');
          }
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('turma.index', ['turmas' => Turma::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('turma.create', ['cursos' => Curso::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $turma = new Turma;
        $turma->nome = $request->nome;
        $turma->curso_id = $request->curso_id;
        $turma->save();

        return Redirect::route('turma.index')->with('status', 'Turma cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function show(Turma $turma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
      return view('turma.edit', [
        'cursos' => Curso::all(),
        'turma' => Turma::findOrFail($id)
      ]);
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
        $turma = Turma::findOrFail($id);
        $turma->nome = $request->nome;
        $turma->curso_id = $request->curso_id;
        $turma->save();

        return Redirect::route('turma.index')->with('status', 'Turma atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $turma = Turma::findOrFail($id);
        $turma->delete();

        return Redirect::route('turma.index')->with('status', 'Turma deletada com sucesso!');
    }

    /**
     * Retorna um JSON com id e nome de todas as turmas pertencentes ao curso.
     */
    public function turmas(int $id)
    {
      $turmas = Curso::findOrFail($id)->turmas->pluck('id', 'nome');
      return Response::json($turmas);
    }
}
