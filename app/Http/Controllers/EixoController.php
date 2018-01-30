<?php

namespace App\Http\Controllers;

use App\Models\Eixo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EixoController extends Controller
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
        return view('eixo.index', ['eixos' => Eixo::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eixo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eixo = new Eixo;
        $eixo->nome = $request->nome;
        $eixo->save();

        return Redirect::route('eixo.index')->with('status', 'Eixo cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Eixo  $eixo
     * @return \Illuminate\Http\Response
     */
    public function show(Eixo $eixo)
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
        return view('eixo.edit', ['eixo' => Eixo::findOrFail($id)]);
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
        $eixo = Eixo::findOrFail($id);
        $eixo->nome = $request->nome;
        $eixo->save();

        return Redirect::route('eixo.index')->with('status', 'Eixo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $eixo = Eixo::findOrFail($id);
        $eixo->delete();

        return Redirect::route('eixo.index')->with('status', 'Eixo deletado com sucesso!');
    }
}
