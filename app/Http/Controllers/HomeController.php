<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\Questionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('dashboard');
    }

    public function status()
    {
        return view('quiz.status');
    }

    /**
     * Atualiza o vínculo do aluno com a instituição.
     *
     * @return \Illuminate\Http\Response
     */
    public function verificar(Request $request)
    {
        $aluno = Pessoa::where('user_id', Auth::user()->id)->first();
        $aluno->vinculo = $request->vinculo;
        $aluno->save();

        return Redirect::route('quiz.escolher');
    }

   /**
    * De acordo com sua situação atual o redireciona para o questionário recomendado.
    *
    * @return \Illuminate\Http\Response
    */
    public function escolher()
    {
        $aluno = Pessoa::where('user_id', Auth::user()->id)->first();

        if ($aluno->vinculo == 1) {
          return view('quiz.questionarioAtivo', ['questionarios' => Questionario::where('disponivel', 1)->get()]);
        } else {
          return view('quiz.questionarioInativo');
        }
    }

}
