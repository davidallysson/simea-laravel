<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Diretoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

class DiretoriaController extends Controller
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
        return view('diretoria.index', ['diretorias' => Diretoria::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diretoria.create', ['campuses' => Campus::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $diretoria = new Diretoria;
        $diretoria->nome = $request->nome;
        $diretoria->campus_id = $request->campus_id;
        $diretoria->save();

        return Redirect::route('diretoria.index')->with('status', 'Diretoria cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diretoria  $diretoria
     * @return \Illuminate\Http\Response
     */
    public function show(Diretoria $diretoria)
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
        return view('diretoria.edit', [
          'campuses' => Campus::all(),
          'diretoria' => Diretoria::findOrFail($id)
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
        $diretoria = Diretoria::findOrFail($id);
        $diretoria->nome = $request->nome;
        $diretoria->campus_id = $request->campus_id;
        $diretoria->save();

        return Redirect::route('diretoria.index')->with('status', 'Diretoria atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
      $diretoria = Diretoria::findOrFail($id);
      $diretoria->delete();

      return Redirect::route('diretoria.index')->with('status', 'Diretoria deletada com sucesso!');
    }

    /**
     * Retorna um JSON com id e nome de todas as diretorias pertencentes ao campus.
     */
    public function diretorias(int $id)
    {
      $diretorias = Campus::findOrFail($id)->diretorias->pluck('id', 'nome');
      return Response::json($diretorias);
    }

}
