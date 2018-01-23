@extends('layouts.app')

@section('title')
  Resultado
@endsection

@section('content')
  <br>
  <div class="row">
    <form class="col s12" action="{{ route('consultarDados') }}" method="POST">
      {{ csrf_field() }}
      <p>
        <span><b>Pesquisar por: </b></span>
        <label>
          <input name="tipoPesquisa" value="campus" type="radio" required /> <span>Campus</span>
        </label>
        <label>
          <input name="tipoPesquisa" value="diretoria" type="radio" required /> <span>Diretoria</span>
        </label>
        <label>
          <input name="tipoPesquisa" value="curso" type="radio" required /> <span>Curso</span>
        </label>
        <label>
          <input name="tipoPesquisa" value="turma" type="radio" required /> <span>Turma</span>
        </label>
      </p>
      <br>
      <div class="row">
        <div id="select_campus" class="input-field col s12 m10" style="display: none;">
          <select id="campus_id" name="campus_id">
            <option value="" disabled selected>Escolha um campus</option>
            @foreach ($campuses as $campus)
              <option value="{{ $campus->id }}" >{{ $campus->nome }}</option>
            @endforeach
          </select>
          <label>Campus</label>
        </div>
      </div>
      <div class="row">
        <div id="select_diretoria" class="input-field col s12 m10" style="display: none;">
          <select id="diretoria_id" name="diretoria_id">
            <option value="" disabled selected>Escolha uma diretoria</option>
            @foreach ($diretorias as $diretoria)
              <option value="{{ $diretoria->id }}">{{ $diretoria->nome }}</option>
            @endforeach
          </select>
          <label>Diretoria</label>
        </div>
      </div>
      <div class="row">
        <div id="select_curso" class="input-field col s12 m10" style="display: none;">
          <select id="curso_id" name="curso_id">
            <option value="" disabled selected>Escolha um curso</option>
            @foreach ($cursos as $curso)
              <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
            @endforeach
          </select>
          <label>Curso</label>
        </div>
      </div>
      <div class="row">
        <div id="select_turma" class="input-field col s12 m10" style="display: none;">
          <select id="turma_id" name="turma_id">
            <option value="" disabled selected>Escolha uma turma</option>
            @foreach ($turmas as $turma)
            <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
            @endforeach
          </select>
          <label>Turma</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m6">
          <input class="btn btn-primary" type="submit" value="Consultar"/>
        </div>
      </div>
    </form>
  </div>

  <script>
      $('input:radio').change(function() {
        if( $('input[value=campus]').is(':checked') ) {
          $('#select_campus').show();
          $('#select_diretoria').hide();
          $('#select_curso').hide();
          $('#select_turma').hide();
          $('#campus_id').prop('required', true);
          $('#diretoria_id').prop('required', false);
          $('#curso_id').prop('required', false);
          $('#turma_id').prop('required', false);
        } else if ( $('input[value=diretoria]').is(':checked') ) {
          $('#select_campus').hide();
          $('#select_diretoria').show();
          $('#select_curso').hide();
          $('#select_turma').hide();
          $('#campus_id').prop('required', false);
          $('#diretoria_id').prop('required', true);
          $('#curso_id').prop('required', false);
          $('#turma_id').prop('required', false);
        } else if ( $('input[value=curso]').is(':checked') ) {
          $('#select_campus').hide();
          $('#select_diretoria').hide();
          $('#select_curso').show();
          $('#select_turma').hide();
          $('#campus_id').prop('required', false);
          $('#diretoria_id').prop('required', false);
          $('#curso_id').prop('required', true);
          $('#turma_id').prop('required', false);
        } else if ( $('input[value=turma]').is(':checked') ) {
          $('#select_campus').hide();
          $('#select_diretoria').hide();
          $('#select_curso').hide();
          $('#select_turma').show();
          $('#campus_id').prop('required', false);
          $('#diretoria_id').prop('required', false);
          $('#curso_id').prop('required', false);
          $('#turma_id').prop('required', true);
        }
      });
  </script>

  <br>
  <div class="row">
    <div class="col s12">
      <div id="evasometro" style="height: 200px;"></div>
    </div>
  </div>
  <div class="row">
    <div class="col s12 m6">
      <div id="graficoRenda" style="height: 400px;"></div>
    </div>
    <div class="col s12 m6">
      <div id="graficoEstadoCivil" style="height: 400px;"></div>
    </div>
  </div>
  <div class="row">
    <div class="col s12 m6">
      <div id="graficoSexo" style="height: 400px;"></div>
    </div>
    <div class="col s12 m6">
      <div id="graficoEtnia" style="height: 400px;"></div>
    </div>
  </div>
  <div class="row">
    <div class="col s12">
      <div id="graficoIdade" style="height: 400px;"></div>
    </div>
  </div>
  <br>

  <script type="text/javascript">
  $(function () {
    // Verificar tamanho da tela para habilitar (ou não) as labels
    if ($(window).width() > 992) {
      var flag = true;
    } else {
      var flag = false;
    }

    var graficoIdade = Highcharts.chart('graficoIdade', {
        chart: { type: 'pie' },
        title: { text: 'Porcentagem de Alunos por Faixa Etária' },
        credits: { enabled: false },
        tooltip: { pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>' },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: flag,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
           name: 'Alunos',
           colorByPoint: true,
           data: [ { name: '15 a 19 anos', y: <?=$intervalo1519?> }, { name: '20 a 24 anos', y: <?=$intervalo2024?> },
             { name: '25 a 29 anos', y: <?=$intervalo2529?> }, { name: '30 a 34 anos', y: <?=$intervalo3034?> },
             { name: '35 a 39 anos', y: <?=$intervalo3539?> }, { name: '40 anos ou mais', y: <?=$intervalo40?> }]
       }]
    });

    var graficoSexo = Highcharts.chart('graficoSexo', {
        chart: { type: 'pie' },
        title: { text: 'Porcentagem de Alunos por Sexo' },
        credits: { enabled: false },
        tooltip: { pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>' },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%']
            }
        },
        series: [{
           name: 'Alunos',
           innerSize: '50%',
           colorByPoint: true,
           data: [{ name: 'Feminino', y: <?=$porcentagemMulheres?> }, { name: 'Masculino', y: <?=$porcentagemHomens?> }]
       }]
    });

    var graficoEtnia = Highcharts.chart('graficoEtnia', {
        chart: { type: 'pie' },
        title: { text: 'Porcentagem de Alunos por Etnia' },
        credits: { enabled: false },
        tooltip: { pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>' },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%']
            }
        },
        series: [{
           name: 'Alunos',
           innerSize: '50%',
           colorByPoint: true,
           data: [{ name: 'Branco', y: <?=$porcentagemBrancos?> }, { name: 'Pardo', y: <?=$porcentagemPardo?> }, { name: 'Preto', y: <?=$porcentagemPreto?> }, { name: 'Indigena', y: <?=$porcentagemIndigena?> }, { name: 'Quilombola', y: <?=$porcentagemQuilombola?> }]
       }]
    });

    var graficoRenda = Highcharts.chart('graficoRenda', {
        chart: { type: 'pie' },
        title: { text: 'Porcentagem de Alunos por Renda Familiar' },
        credits: { enabled: false },
        tooltip: { pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>' },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: flag,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
           name: 'Alunos',
           colorByPoint: true,
           data: [{ name: 'Quatro salários ou mais', y: <?=$porcentagemQuatroSalarios?> }, { name: 'Três salários', y: <?=$porcentagemTresSalarios?> }, { name: 'Dois salários', y: <?=$porcentagemDoisSalarios?> }, { name: 'Um salário', y: <?=$porcentagemUmSalario?> }]
       }]
    });

    var graficoEstadoCivil = Highcharts.chart('graficoEstadoCivil', {
        chart: { type: 'pie' },
        title: { text: 'Porcentagem de Alunos por Estado Civil' },
        credits: { enabled: false },
        tooltip: { pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>' },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: flag,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
           name: 'Alunos',
           colorByPoint: true,
           data: [ { name: 'Viúvo', y: <?=$porcentagemViuvos?> }, { name: 'Divorciado', y: <?=$porcentagemDivorciados?> }, { name: 'Casado', y: <?=$porcentagemCasados?> }, { name: 'Solteiro', y: <?=$porcentagemSolteiros?> }]
       }]
    });

    var graficoEvasometro = Highcharts.chart('evasometro', {
        chart: { type: 'solidgauge' },
        title: { text: '' },
        credits: { enabled: false },
        pane: {
            center: ['50%', '85%'],
            size: '150%',
            startAngle: -90,
            endAngle: 90,
            background: {
                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
                innerRadius: '60%',
                outerRadius: '100%',
                shape: 'arc'
            }
        },
        tooltip: { enabled: false },
        yAxis: {
            min: 0,
            max: 10,
            stops: [
                [0.1, '#55BF3B'], // green
                [0.5, '#DDDF0D'], // yellow
                [0.9, '#DF5353'] // red
            ],
            minorTickInterval: null,
            tickAmount: 2,
            labels: { y: 16 }
        },
        plotOptions: { solidgauge: { dataLabels: { y: 5, borderWidth: 0, useHTML: true } } },
        series: [{
            name: 'Evasometro',
            data: [<?=$evasometro?>],
            dataLabels: {
                format: '<div style="text-align:center"><span style="font-size:25px;color:black">{y}</span><br/>' +
                        '<span style="font-size:12px;color:silver">Evasometro</span></div>'
            },
        }]
    });
  });
  </script>
@endsection
