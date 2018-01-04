<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Diretoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

        return Redirect::route('diretoria.index');
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
     * @param  \App\Diretoria  $diretoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Diretoria $diretoria)
    {
        return view('diretoria.edit', [
          'diretoria' => Diretoria::findOrFail($diretoria->id),
          'campuses' => Campus::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diretoria  $diretoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diretoria $diretoria)
    {
        $diretoria = Diretoria::findOrFail($diretoria->id);
        $diretoria->nome = $request->nome;
        $diretoria->campus_id = $request->campus_id;
        $diretoria->save();

        return Redirect::route('diretoria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diretoria  $diretoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diretoria $diretoria)
    {
      $diretoria->delete();

      return Redirect::route('diretoria.index');
    }
}
