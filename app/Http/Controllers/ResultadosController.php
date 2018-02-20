<?php

namespace App\Http\Controllers;

use DateTime;
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
        return view('resultados.consultar', ['campuses' => Campus::all()]);
    }

    public function consultarDados(Request $request)
    {
        $pontuacao = 0;
        $homens = 0; $mulheres = 0;
        $quantidadeAlunos = 0; $quantidadeQuestionarios = 0;
        $solteiros = 0; $casados = 0; $viuvos = 0; $divorciados = 0;
        $branco = 0; $preto = 0; $pardo = 0; $indigena = 0; $quilombola = 0;
        $umSalario = 0; $doisSalarios = 0; $tresSalarios = 0; $quatroSalarios = 0;
        $intervalo1519 = 0; $intervalo2024 = 0; $intervalo2529 = 0; $intervalo3034 = 0; $intervalo3539 = 0; $intervalo40 = 0;
        $individual = 0; $familiar = 0; $intraescolar = 0; $carreira = 0; $formacao = 0; $institucional = 0;

        if ($request->aluno_id != "") {
          $aluno = Pessoa::findOrFail($request->aluno_id);
          foreach ($aluno->resultados as $resultado) {
            $pontuacao += $resultado->pontos;
            $quantidadeQuestionarios++;

            if ($resultado->questionario_id == 1) {
              $individual += $resultado->pontos;
            } else if ($resultado->questionario_id == 2) {
              $familiar += $resultado->pontos;
            } else if ($resultado->questionario_id == 3) {
              $intraescolar += $resultado->pontos;
            } else if ($resultado->questionario_id == 4) {
              $carreira += $resultado->pontos;
            } else if ($resultado->questionario_id == 5) {
              $formacao += $resultado->pontos;
            } else if ($resultado->questionario_id == 6) {
              $institucional += $resultado->pontos;
            }

          }
          switch ($aluno->raca) {
            case 'Branco':     $branco++; break;
            case 'Preto':      $preto++; break;
            case 'Pardo':      $pardo++; break;
            case 'Indigena':   $indigena++; break;
            case 'Quilombola': $quilombola++; break;
          }
          switch ($aluno->renda) {
            case 1: $umSalario++; break;
            case 2: $doisSalarios++; break;
            case 3: $tresSalarios++; break;
            case 4: $quatroSalarios++; break;
          }
          switch ($aluno->sexo) {
            case 'Masculino': $homens++; break;
            case 'Feminino':  $mulheres++; break;
          }
          switch ($aluno->estadoCivil) {
            case 'Solteiro': $solteiros++; break;
            case 'Casado': $casados++; break;
            case 'Divorciado': $divorciados++; break;
            case 'Viuvo': $viuvos++; break;
          }
          $dataAtual = new DateTime();
          $dataAluno = new DateTime($aluno->dataNascimento);
          $intervalo = $dataAtual->diff( $dataAluno );

          if ( $intervalo->y >= 15 && $intervalo->y <= 19 ) {
            $intervalo1519++;
          } else if ( $intervalo->y >= 20 && $intervalo->y <= 24 ) {
            $intervalo2024++;
          } else if ( $intervalo->y >= 25 && $intervalo->y <= 29 ) {
            $intervalo2529++;
          } else if ( $intervalo->y >= 30 && $intervalo->y <= 34 ) {
            $intervalo3034++;
          } else if ( $intervalo->y >= 35 && $intervalo->y <= 39 ) {
            $intervalo3539++;
          } else if ( $intervalo->y >= 40 ) {
            $intervalo40++;
          }
          $quantidadeAlunos++;
        } else if ($request->turma_id != "") {
          $alunos = Pessoa::where('turma_id', $request->turma_id)->get();
          foreach ($alunos as $aluno) {
            foreach ($aluno->resultados as $resultado) {
              $pontuacao += $resultado->pontos;
              $quantidadeQuestionarios++;

              if ($resultado->questionario_id == 1) {
                $individual += $resultado->pontos;
              } else if ($resultado->questionario_id == 2) {
                $familiar += $resultado->pontos;
              } else if ($resultado->questionario_id == 3) {
                $intraescolar += $resultado->pontos;
              } else if ($resultado->questionario_id == 4) {
                $carreira += $resultado->pontos;
              } else if ($resultado->questionario_id == 5) {
                $formacao += $resultado->pontos;
              } else if ($resultado->questionario_id == 6) {
                $institucional += $resultado->pontos;
              }

            }
            switch ($aluno->raca) {
              case 'Branco':     $branco++; break;
              case 'Preto':      $preto++; break;
              case 'Pardo':      $pardo++; break;
              case 'Indigena':   $indigena++; break;
              case 'Quilombola': $quilombola++; break;
            }
            switch ($aluno->renda) {
              case 1: $umSalario++; break;
              case 2: $doisSalarios++; break;
              case 3: $tresSalarios++; break;
              case 4: $quatroSalarios++; break;
            }
            switch ($aluno->sexo) {
              case 'Masculino': $homens++; break;
              case 'Feminino':  $mulheres++; break;
            }
            switch ($aluno->estadoCivil) {
              case 'Solteiro': $solteiros++; break;
              case 'Casado': $casados++; break;
              case 'Divorciado': $divorciados++; break;
              case 'Viuvo': $viuvos++; break;
            }
            $dataAtual = new DateTime();
            $dataAluno = new DateTime($aluno->dataNascimento);
            $intervalo = $dataAtual->diff( $dataAluno );

            if ( $intervalo->y >= 15 && $intervalo->y <= 19 ) {
              $intervalo1519++;
            } else if ( $intervalo->y >= 20 && $intervalo->y <= 24 ) {
              $intervalo2024++;
            } else if ( $intervalo->y >= 25 && $intervalo->y <= 29 ) {
              $intervalo2529++;
            } else if ( $intervalo->y >= 30 && $intervalo->y <= 34 ) {
              $intervalo3034++;
            } else if ( $intervalo->y >= 35 && $intervalo->y <= 39 ) {
              $intervalo3539++;
            } else if ( $intervalo->y >= 40 ) {
              $intervalo40++;
            }
            $quantidadeAlunos++;
          }
        } else if ($request->curso_id != "") {
          $turmas = Turma::where('curso_id', $request->curso_id)->get();
          foreach ($turmas as $turma) {
            $alunos = Pessoa::where('turma_id', $turma->id)->get();
            foreach ($alunos as $aluno) {
              foreach ($aluno->resultados as $resultado) {
                $pontuacao += $resultado->pontos;
                $quantidadeQuestionarios++;

                if ($resultado->questionario_id == 1) {
                  $individual += $resultado->pontos;
                } else if ($resultado->questionario_id == 2) {
                  $familiar += $resultado->pontos;
                } else if ($resultado->questionario_id == 3) {
                  $intraescolar += $resultado->pontos;
                } else if ($resultado->questionario_id == 4) {
                  $carreira += $resultado->pontos;
                } else if ($resultado->questionario_id == 5) {
                  $formacao += $resultado->pontos;
                } else if ($resultado->questionario_id == 6) {
                  $institucional += $resultado->pontos;
                }

              }
              switch ($aluno->raca) {
                case 'Branco':     $branco++; break;
                case 'Preto':      $preto++; break;
                case 'Pardo':      $pardo++; break;
                case 'Indigena':   $indigena++; break;
                case 'Quilombola': $quilombola++; break;
              }
              switch ($aluno->renda) {
                case 1: $umSalario++; break;
                case 2: $doisSalarios++; break;
                case 3: $tresSalarios++; break;
                case 4: $quatroSalarios++; break;
              }
              switch ($aluno->sexo) {
                case 'Masculino': $homens++; break;
                case 'Feminino':  $mulheres++; break;
              }
              switch ($aluno->estadoCivil) {
                case 'Solteiro': $solteiros++; break;
                case 'Casado': $casados++; break;
                case 'Divorciado': $divorciados++; break;
                case 'Viuvo': $viuvos++; break;
              }
              $dataAtual = new DateTime();
              $dataAluno = new DateTime($aluno->dataNascimento);
              $intervalo = $dataAtual->diff( $dataAluno );

              if ( $intervalo->y >= 15 && $intervalo->y <= 19 ) {
                $intervalo1519++;
              } else if ( $intervalo->y >= 20 && $intervalo->y <= 24 ) {
                $intervalo2024++;
              } else if ( $intervalo->y >= 25 && $intervalo->y <= 29 ) {
                $intervalo2529++;
              } else if ( $intervalo->y >= 30 && $intervalo->y <= 34 ) {
                $intervalo3034++;
              } else if ( $intervalo->y >= 35 && $intervalo->y <= 39 ) {
                $intervalo3539++;
              } else if ( $intervalo->y >= 40 ) {
                $intervalo40++;
              }
              $quantidadeAlunos++;
            }
          }
        } else if ($request->diretoria_id != "") {
          $cursos = Curso::where('diretoria_id', $request->diretoria_id)->get();
          foreach ($cursos as $curso) {
            $turmas = Turma::where('curso_id', $curso->id)->get();
            foreach ($turmas as $turma) {
              $alunos = Pessoa::where('turma_id', $turma->id)->get();
              foreach ($alunos as $aluno) {
                foreach ($aluno->resultados as $resultado) {
                  $pontuacao += $resultado->pontos;
                  $quantidadeQuestionarios++;

                  if ($resultado->questionario_id == 1) {
                    $individual += $resultado->pontos;
                  } else if ($resultado->questionario_id == 2) {
                    $familiar += $resultado->pontos;
                  } else if ($resultado->questionario_id == 3) {
                    $intraescolar += $resultado->pontos;
                  } else if ($resultado->questionario_id == 4) {
                    $carreira += $resultado->pontos;
                  } else if ($resultado->questionario_id == 5) {
                    $formacao += $resultado->pontos;
                  } else if ($resultado->questionario_id == 6) {
                    $institucional += $resultado->pontos;
                  }

                }
                switch ($aluno->raca) {
                  case 'Branco':     $branco++; break;
                  case 'Preto':      $preto++; break;
                  case 'Pardo':      $pardo++; break;
                  case 'Indigena':   $indigena++; break;
                  case 'Quilombola': $quilombola++; break;
                }
                switch ($aluno->renda) {
                  case 1: $umSalario++; break;
                  case 2: $doisSalarios++; break;
                  case 3: $tresSalarios++; break;
                  case 4: $quatroSalarios++; break;
                }
                switch ($aluno->sexo) {
                  case 'Masculino': $homens++; break;
                  case 'Feminino':  $mulheres++; break;
                }
                switch ($aluno->estadoCivil) {
                  case 'Solteiro': $solteiros++; break;
                  case 'Casado': $casados++; break;
                  case 'Divorciado': $divorciados++; break;
                  case 'Viuvo': $viuvos++; break;
                }
                $dataAtual = new DateTime();
                $dataAluno = new DateTime($aluno->dataNascimento);
                $intervalo = $dataAtual->diff( $dataAluno );

                if ( $intervalo->y >= 15 && $intervalo->y <= 19 ) {
                  $intervalo1519++;
                } else if ( $intervalo->y >= 20 && $intervalo->y <= 24 ) {
                  $intervalo2024++;
                } else if ( $intervalo->y >= 25 && $intervalo->y <= 29 ) {
                  $intervalo2529++;
                } else if ( $intervalo->y >= 30 && $intervalo->y <= 34 ) {
                  $intervalo3034++;
                } else if ( $intervalo->y >= 35 && $intervalo->y <= 39 ) {
                  $intervalo3539++;
                } else if ( $intervalo->y >= 40 ) {
                  $intervalo40++;
                }
                $quantidadeAlunos++;
              }
            }
          }
        } else if ($request->campus_id != "") {
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

                    if ($resultado->questionario_id == 1) {
                      $individual += $resultado->pontos;
                    } else if ($resultado->questionario_id == 2) {
                      $familiar += $resultado->pontos;
                    } else if ($resultado->questionario_id == 3) {
                      $intraescolar += $resultado->pontos;
                    } else if ($resultado->questionario_id == 4) {
                      $carreira += $resultado->pontos;
                    } else if ($resultado->questionario_id == 5) {
                      $formacao += $resultado->pontos;
                    } else if ($resultado->questionario_id == 6) {
                      $institucional += $resultado->pontos;
                    }

                  }
                  switch ($aluno->raca) {
                    case 'Branco':     $branco++; break;
                    case 'Preto':      $preto++; break;
                    case 'Pardo':      $pardo++; break;
                    case 'Indigena':   $indigena++; break;
                    case 'Quilombola': $quilombola++; break;
                  }
                  switch ($aluno->renda) {
                    case 1: $umSalario++; break;
                    case 2: $doisSalarios++; break;
                    case 3: $tresSalarios++; break;
                    case 4: $quatroSalarios++; break;
                  }
                  switch ($aluno->sexo) {
                    case 'Masculino': $homens++; break;
                    case 'Feminino':  $mulheres++; break;
                  }
                  switch ($aluno->estadoCivil) {
                    case 'Solteiro': $solteiros++; break;
                    case 'Casado': $casados++; break;
                    case 'Divorciado': $divorciados++; break;
                    case 'Viuvo': $viuvos++; break;
                  }
                  $dataAtual = new DateTime();
                  $dataAluno = new DateTime($aluno->dataNascimento);
                  $intervalo = $dataAtual->diff( $dataAluno );

                  if ( $intervalo->y >= 15 && $intervalo->y <= 19 ) {
                    $intervalo1519++;
                  } else if ( $intervalo->y >= 20 && $intervalo->y <= 24 ) {
                    $intervalo2024++;
                  } else if ( $intervalo->y >= 25 && $intervalo->y <= 29 ) {
                    $intervalo2529++;
                  } else if ( $intervalo->y >= 30 && $intervalo->y <= 34 ) {
                    $intervalo3034++;
                  } else if ( $intervalo->y >= 35 && $intervalo->y <= 39 ) {
                    $intervalo3539++;
                  } else if ( $intervalo->y >= 40 ) {
                    $intervalo40++;
                  }
                  $quantidadeAlunos++;
                }
              }
            }
          }
        }

        // Caso não sejam encontrados alunos a partir da pesquisa para a geração de gráficos.
        if ($quantidadeAlunos == 0) {
          return Redirect::route('consultar')->with('status', 'Não foram encontrados alunos nesta pesquisa.');
        }
        else {
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
          $porcentagemSolteiros = $solteiros * 100 / $quantidadeAlunos;
          $porcentagemCasados = $casados * 100 / $quantidadeAlunos;
          $porcentagemDivorciados = $divorciados * 100 / $quantidadeAlunos;
          $porcentagemViuvos = $viuvos * 100 / $quantidadeAlunos;
          $porcentagemIntervalo1 = $intervalo1519 * 100 / $quantidadeAlunos;
          $porcentagemIntervalo2 = $intervalo2024 * 100 / $quantidadeAlunos;
          $porcentagemIntervalo3 = $intervalo2529 * 100 / $quantidadeAlunos;
          $porcentagemIntervalo4 = $intervalo3034 * 100 / $quantidadeAlunos;
          $porcentagemIntervalo5 = $intervalo3539 * 100 / $quantidadeAlunos;
          $porcentagemIntervalo6 = $intervalo40 * 100 / $quantidadeAlunos;
          return view('resultados.resultado', [
            'campuses' => Campus::all(),
            'evasometro' => number_format($evasometro, 2),
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
            'porcentagemSolteiros' => $porcentagemSolteiros,
            'porcentagemCasados' => $porcentagemCasados,
            'porcentagemDivorciados' => $porcentagemDivorciados,
            'porcentagemViuvos' => $porcentagemViuvos,
            'intervalo1519' => $porcentagemIntervalo1,
            'intervalo2024' => $porcentagemIntervalo2,
            'intervalo2529' => $porcentagemIntervalo3,
            'intervalo3034' => $porcentagemIntervalo4,
            'intervalo3539' => $porcentagemIntervalo5,
            'intervalo40' => $porcentagemIntervalo6,
            'individual' => $individual,
            'familiar' => $familiar,
            'intraescolar' => $intraescolar,
            'carreira' => $carreira,
            'formacao' => $formacao,
            'institucional' => $institucional,
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
