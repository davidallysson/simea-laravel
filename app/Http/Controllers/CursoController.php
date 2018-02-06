<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Diretoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

class CursoController extends Controller
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
        return view('curso.index', ['cursos' => Curso::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('curso.create', ['diretorias' => Diretoria::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curso = new Curso;
        $curso->nome = $request->nome;
        $curso->diretoria_id = $request->diretoria_id;
        $curso->save();

        return Redirect::route('curso.index')->with('status', 'Curso cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
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
        return view('curso.edit', [
          'diretorias' => Diretoria::all(),
          'curso' => Curso::findOrFail($id)
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
        $curso = Curso::findOrFail($id);
        $curso->nome = $request->nome;
        $curso->diretoria_id = $request->diretoria_id;
        $curso->save();

        return Redirect::route('curso.index')->with('status', 'Curso atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return Redirect::route('curso.index')->with('status', 'Curso deletado com sucesso!');
    }

    /**
     * Retorna um JSON com id e nome de todas os cursos pertencentes a diretoria.
     */
    public function cursos(int $id)
    {
      $cursos = Diretoria::findOrFail($id)->cursos->pluck('id', 'nome');
      return Response::json($cursos);
    }
}
