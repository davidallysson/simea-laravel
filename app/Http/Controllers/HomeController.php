<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\Questao;
use App\Models\Motivo;
use App\Models\Resultados;
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

    /**
     * Mostra a view de atualização de vínculo
     *
     * @return \Illuminate\Http\Response
     */
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
          return view('quiz.questionarioAtivo', [
            'questionarios' => Questionario::where('disponivel', 1)->get(),
            'resultados' => Resultados::where('pessoa_id', Auth::user()->pessoa->id)->get()
          ]);
        } else if ($aluno->vinculo == 2) {
          return view('quiz.questionarioInativo');
        }
    }

    /**
    * Inicia o questionário e recebe o $id do questionário como parâmetro.
    *
    * @return \Illuminate\Http\Response
    */
    public function iniciar(int $id)
    {
        //Descobre se o usuário já havia respondido alguma pergunta referente a aquele questionário.
        $resultado = Resultados::where('pessoa_id', Auth::user()->pessoa->id)->where('questionario_id', $id)->first();
        if ($resultado == null) {
          $resultado_id = 0; // Caso não é enviado valor '0' para a view.
        } else {
          $resultado_id = $resultado->id; // Caso sim é enviado o id do resultado para aquele usuário.
        }
        return view('quiz.perguntas', [
          'questoes' => Questao::where('questionario_id', $id)->paginate(1),
          'questionario' => Questionario::findOrFail($id),
          'resultado' => $resultado_id,
        ]);
    }

    /**
     * Calcula a pontuação do usuário para questionários ativos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function resultado(Request $request)
    {
        $pontos = 0;

        // Caso o resultado_id seja valor '0' deve-se criar um novo resultado.
        // Caso não, então se atualiza o resultado já existente.

        if($request->resultado_id == 0) {
          $resultado = new Resultados;
        } else {
          $resultado = Resultados::findOrFail($request->resultado_id);
        }

        $pontos += $request->alternativa0 * 1;
        $pontos += $request->alternativa1 * 2;
        $pontos += $request->alternativa2 * 3;
        $pontos += $request->alternativa3 * 4;

        $pontos -= 20;

        // Para acumular os pontos das questões passadas
        $pontos += $resultado->pontos;

        // Fazer a média com os pontos já existentes, caso existam.
        if ($resultado->pontos != 0) {
          $pontos /= 2;
        }

        $resultado->pontos = $pontos;
        $resultado->pessoa_id = Auth::user()->pessoa->id;
        $resultado->questionario_id = $request->questionario_id;

        $resultado->save();

        return redirect($request->next_url);

    }

    /**
     * Salva os motivos do aluno inativo em evadir da instituição.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function resultadoInativo(Request $request)
    {
      $motivos = new Motivo;

      foreach ($request->motivos as $motivo) {
        $motivos->motivos .= $motivo . "<br>";
      }
      $motivos->motivos .= $request->outro . "<br>";
      $motivos->resposta = "";

      $motivos->pessoa_id = Auth::user()->pessoa->id;

      $motivos->save();

      return Redirect::route('home');
    }

    public function finalDoQuestionario()
    {
      return view('quiz.final');
    }

}
