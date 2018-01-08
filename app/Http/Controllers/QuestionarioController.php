<?php

namespace App\Http\Controllers;

use App\Models\Questionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class QuestionarioController extends Controller
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
        return view('questionario.index', ['questionarios' => Questionario::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questionario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $questionario = new Questionario;
        $questionario->titulo = $request->titulo;
        if ($request->disponivel == "on") {
          $questionario->disponivel = 1;
        } else {
          $questionario->disponivel = 0;
        }
        $questionario->save();

        return Redirect::route('questionario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Questionario  $questionario
     * @return \Illuminate\Http\Response
     */
    public function show(Questionario $questionario)
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
        return view('questionario.edit', ['questionario' => Questionario::findOrFail($id)]);
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
        $questionario = Questionario::findOrFail($id);
        $questionario->titulo = $request->titulo;
        if ($request->disponivel == "on") {
          $questionario->disponivel = 1;
        } else {
          $questionario->disponivel = 0;
        }
        $questionario->save();

        return Redirect::route('questionario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $questionario = Questionario::findOrFail($id);
        $questionario->delete();

        return Redirect::route('questionario.index');
    }
}
