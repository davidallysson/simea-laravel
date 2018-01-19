<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Turma;
use App\Models\Pessoa;
use App\Models\Campus;
use App\Models\Diretoria;
use App\Models\Resultados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ResultadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('resultados.consultar', [
          'campuses' => Campus::all(),
          'diretorias' => Diretoria::all(),
          'cursos' => Curso::all(),
          'turmas' => Turma::all(),
        ]);
    }

    public function consultarDados(Request $request)
    {
        $pontuacao = 0;
        $homens = 0;
        $mulheres = 0;
        $branco = 0;
        $preto = 0;
        $pardo = 0;
        $indigena = 0;
        $quilombola = 0;
        $umSalario = 0;
        $doisSalarios = 0;
        $tresSalarios = 0;
        $quatroSalarios = 0;
        $quantidadeAlunos = 0;
        $quantidadeQuestionarios = 0;
        // Caso a pesquisa seja por campus
        if ($request->tipoPesquisa == "campus") {
          $diretorias = Diretoria::where('campus_id', $request->campus_id)->get();
          foreach ($diretorias as $diretoria) {
            $cursos = Curso::where('diretoria_id', $diretoria->id)->get();
            foreach ($cursos as $curso) {
              $turmas = Turma::where('curso_id', $curso->id)->get();
              foreach ($turmas as $turma) {
                $alunos = Pessoa::where('turma_id', $turma->id)->get();
                foreach ($alunos as $aluno) {
                  foreach ($aluno->resultados as $resultado) {
                    $pontuacao += $resultado->pontos;
                    $quantidadeQuestionarios++;
                  }
                }
              }
            }
          }

          $evasometro = $pontuacao / $quantidadeQuestionarios;
          return view('resultados.resultado', [
            'campuses' => Campus::all(),
            'diretorias' => Diretoria::all(),
            'cursos' => Curso::all(),
            'turmas' => Turma::all(),
            'evasometro' => $evasometro,
          ]);
        }
        // Caso a pesquisa seja por diretoria
        if ($request->tipoPesquisa == "diretoria") {
          $cursos = Curso::where('diretoria_id', $request->diretoria_id)->get();
          foreach ($cursos as $curso) {
            $turmas = Turma::where('curso_id', $curso->id)->get();
            foreach ($turmas as $turma) {
              $alunos = Pessoa::where('turma_id', $turma->id)->get();
              foreach ($alunos as $aluno) {
                foreach ($aluno->resultados as $resultado) {
                  $pontuacao += $resultado->pontos;
                  $quantidadeQuestionarios++;
                }
              }
            }
          }

          $evasometro = $pontuacao / $quantidadeQuestionarios;
          return view('resultados.resultado', [
            'campuses' => Campus::all(),
            'diretorias' => Diretoria::all(),
            'cursos' => Curso::all(),
            'turmas' => Turma::all(),
            'evasometro' => $evasometro,
          ]);
        }
        // Caso a pesquisa seja por curso
        if ($request->tipoPesquisa == "curso") {
          $turmas = Turma::where('curso_id', $request->curso_id)->get();
          foreach ($turmas as $turma) {
            $alunos = Pessoa::where('turma_id', $turma->id)->get();
            foreach ($alunos as $aluno) {
              foreach ($aluno->resultados as $resultado) {
                $pontuacao += $resultado->pontos;
                $quantidadeQuestionarios++;
              }
            }
          }
          $evasometro = $pontuacao / $quantidadeQuestionarios;
          return view('resultados.resultado', [
            'campuses' => Campus::all(),
            'diretorias' => Diretoria::all(),
            'cursos' => Curso::all(),
            'turmas' => Turma::all(),
            'evasometro' => $evasometro,
          ]);
        }
        // Caso a pesquisa seja por turma
        if ($request->tipoPesquisa == "turma") {
          $alunos = Pessoa::where('turma_id', $request->turma_id)->get();
          foreach ($alunos as $aluno) {
            foreach ($aluno->resultados as $resultado) {
              $pontuacao += $resultado->pontos;
              $quantidadeQuestionarios++;
            }
            switch ($aluno->raca) {
              case 'Branco':
                $branco++;
                break;
              case 'Preto':
                $preto++;
                break;
              case 'Pardo':
                $pardo++;
                break;
              case 'Indigena':
                $indigena++;
                break;
              case 'Quilombola':
                $quilombola++;
                break;
            }
            switch ($aluno->renda) {
              case 1:
                $umSalario++;
                break;
              case 2:
                $doisSalarios++;
                break;
              case 3:
                $tresSalarios++;
                break;
              case 4:
                $quatroSalarios++;
                break;
            }
            switch ($aluno->sexo) {
              case 'Masculino':
                $homens++;
                break;
              case 'Feminino':
                $mulheres++;
                break;
            }
            $quantidadeAlunos++;
          }
          $evasometro = $pontuacao / $quantidadeQuestionarios;
          $porcentagemHomens = $homens * 100 / $quantidadeAlunos;
          $porcentagemMulheres = $mulheres * 100 / $quantidadeAlunos;
          $porcentagemBrancos = $branco * 100 / $quantidadeAlunos;
          $porcentagemPreto = $preto * 100 / $quantidadeAlunos;
          $porcentagemPardo = $pardo * 100 / $quantidadeAlunos;
          $porcentagemIndigena = $indigena * 100 / $quantidadeAlunos;
          $porcentagemQuilombola = $quilombola * 100 / $quantidadeAlunos;
          $porcentagemUmSalario = $umSalario * 100 / $quantidadeAlunos;
          $porcentagemDoisSalarios = $doisSalarios * 100 / $quantidadeAlunos;
          $porcentagemTresSalarios = $tresSalarios * 100 / $quantidadeAlunos;
          $porcentagemQuatroSalarios = $quatroSalarios * 100 / $quantidadeAlunos;
          return view('resultados.resultado', [
            'campuses' => Campus::all(),
            'diretorias' => Diretoria::all(),
            'cursos' => Curso::all(),
            'turmas' => Turma::all(),
            'evasometro' => $evasometro,
            'porcentagemHomens' => $porcentagemHomens,
            'porcentagemMulheres' => $porcentagemMulheres,
            'porcentagemBrancos' => $porcentagemBrancos,
            'porcentagemPreto' => $porcentagemPreto,
            'porcentagemPardo' => $porcentagemPardo,
            'porcentagemIndigena' => $porcentagemIndigena,
            'porcentagemQuilombola' => $porcentagemQuilombola,
            'porcentagemUmSalario' => $porcentagemUmSalario,
            'porcentagemDoisSalarios' => $porcentagemDoisSalarios,
            'porcentagemTresSalarios' => $porcentagemTresSalarios,
            'porcentagemQuatroSalarios' => $porcentagemQuatroSalarios,
          ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resultados  $resultados
     * @return \Illuminate\Http\Response
     */
    public function show(Resultados $resultados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resultados  $resultados
     * @return \Illuminate\Http\Response
     */
    public function edit(Resultados $resultados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resultados  $resultados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resultados $resultados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resultados  $resultados
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resultados $resultados)
    {
        //
    }
}
