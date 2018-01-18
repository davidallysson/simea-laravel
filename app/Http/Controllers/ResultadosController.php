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
        $evasometro = 0;
        $pontuacao = 0;
        $quantidadeQuestionarios = 0;

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

        if ($request->tipoPesquisa == "turma") {
          $alunos = Pessoa::where('turma_id', $request->turma_id)->get();
          foreach ($alunos as $aluno) {
            foreach ($aluno->resultados as $resultado) {
              $pontuacao += $resultado->pontos;
              $quantidadeQuestionarios++;
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
