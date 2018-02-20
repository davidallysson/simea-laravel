@extends('layouts.app')

@section('title')
  Resultado
@endsection

@section('content')
  <br>
  <div class="row">
    <form class="col s12" action="{{ route('consultarDados') }}" method="POST">
      {{ csrf_field() }}
      <div class="row" id="select_campus">
        <div class="input-field col s12 m10">
          <select id="campus_id" name="campus_id" required>
            <option value="" disabled selected>Escolha uma opção</option>
            @foreach ($campuses as $campus)
              <option value="{{ $campus->id }}" >{{ $campus->nome }}</option>
            @endforeach
          </select>
          <label>Campus</label>
        </div>
      </div>
      <div class="row" id="select_diretoria">
        <div class="input-field col s12 m10">
          <select id="diretoria_id" name="diretoria_id" disabled>
            <option value="" disabled selected>Escolha uma opção</option>
          </select>
          <label>Diretoria</label>
        </div>
      </div>
      <div class="row" id="select_curso">
        <div class="input-field col s12 m10">
          <select id="curso_id" name="curso_id" disabled>
            <option value="" disabled selected>Escolha uma opção</option>
          </select>
          <label>Curso</label>
        </div>
      </div>
      <div class="row" id="select_turma">
        <div class="input-field col s12 m10">
          <select id="turma_id" name="turma_id" disabled>
            <option value="" disabled selected>Escolha uma opção</option>
          </select>
          <label>Turma</label>
        </div>
      </div>
      <div class="row" id="select_aluno">
        <div class="input-field col s12 m10">
          <select id="aluno_id" name="aluno_id" disabled>
            <option value="" disabled selected>Escolha uma opção</option>
          </select>
          <label>Aluno</label>
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
      $('#select_campus').change(function () {
        $('#diretoria_id').prop("disabled", false);
        $("#diretoria_id").html('<option value="" disabled selected>Escolha uma opção</option>');
        $.get('/campus/diretorias/' + $('#campus_id').val(), function(diretorias) {
          if (diretorias.length === 0) {
            $('#diretoria_id').prop("disabled", true);
            $("#diretoria_id").html('<option value="" disabled selected>Escolha uma opção</option>');
            $('select').select();
          } else {
            $.each(diretorias, function (key, value) {
              $('#diretoria_id').append('<option value="' + value + '">' + key + '</option>');
              $('select').select();
            });
          }
          $('#curso_id').prop("disabled", true);
          $("#curso_id").html('<option value="" disabled selected>Escolha uma opção</option>');
          $('#turma_id').prop("disabled", true);
          $("#turma_id").html('<option value="" disabled selected>Escolha uma opção</option>');
          $('#aluno_id').prop("disabled", true);
          $("#aluno_id").html('<option value="" disabled selected>Escolha uma opção</option>');
          $('select').select();
        });
      });

      $('#select_diretoria').change(function () {
        $('#curso_id').prop("disabled", false);
        $("#curso_id").html('<option value="" disabled selected>Escolha uma opção</option>');
        $.get('/diretoria/cursos/' + $('#diretoria_id').val(), function(cursos) {
          if (cursos.length === 0) {
            $('#curso_id').prop("disabled", true);
            $("#curso_id").html('<option value="" disabled selected>Escolha uma opção</option>');
            $('select').select();
          } else {
            $.each(cursos, function (key, value) {
              $('#curso_id').append('<option value="' + value + '">' + key + '</option>');
              $('select').select();
            });
          }
          $('#turma_id').prop("disabled", true);
          $("#turma_id").html('<option value="" disabled selected>Escolha uma opção</option>');
          $('#aluno_id').prop("disabled", true);
          $("#aluno_id").html('<option value="" disabled selected>Escolha uma opção</option>');
          $('select').select();
        });
      });

      $('#select_curso').change(function () {
        $('#turma_id').prop("disabled", false);
        $("#turma_id").html('<option value="" disabled selected>Escolha uma opção</option>');
        $.get('/curso/turmas/' + $('#curso_id').val(), function(turmas) {
          if (turmas.length === 0) {
            $('#turma_id').prop("disabled", true);
            $("#turma_id").html('<option value="" disabled selected>Escolha uma opção</option>');
            $('select').select();
          } else {
            $.each(turmas, function (key, value) {
              $('#turma_id').append('<option value="' + value + '">' + key + '</option>');
              $('select').select();
            });
          }
          $('#aluno_id').prop("disabled", true);
          $("#aluno_id").html('<option value="" disabled selected>Escolha uma opção</option>');
          $('select').select();
        });
      });

      $('#select_turma').change(function () {
        $('#aluno_id').prop("disabled", false);
        $("#aluno_id").html('<option value="" disabled selected>Escolha uma opção</option>');
        $.get('/turma/alunos/' + $('#turma_id').val(), function(alunos) {
          if (alunos.length === 0) {
            $('#aluno_id').prop("disabled", true);
            $("#aluno_id").html('<option value="" disabled selected>Escolha uma opção</option>');
            $('select').select();
          } else {
            $.each(alunos, function (key, value) {
              $('#aluno_id').append('<option value="' + value + '">' + key + '</option>');
              $('select').select();
            });
          }
        });
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
      <div id="graficoEixos" style="height: 400px;"></div>
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

    var graficoEixos = Highcharts.chart('graficoEixos', {
      chart: { polar: true, type: 'line'},
      title: { text: 'Parametros/Eixos', x: -45 },
      credits: { enabled: false },
      pane: { size: '70%' },
      xAxis: {
          categories: ['Individual', 'Familiar', 'Intraescolar', 'Carreira Profissional', 'Área de Formação', 'Institucional'],
          tickmarkPlacement: 'on',
          lineWidth: 0
      },
      yAxis: {
          gridLineInterpolation: 'polygon',
          lineWidth: 0,
          min: 0
      },
      tooltip: { shared: true, pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}</b><br/>' },
      legend: {
          align: 'right',
          verticalAlign: 'top',
          y: 0,
          layout: 'vertical'
      },
      series: [{
          name: 'Evasão',
          data: [<?=$individual?>, <?=$familiar?>, <?=$intraescolar?>, <?=$carreira?>, <?=$formacao?>, <?=$institucional?>],
          pointPlacement: 'on'
      }]

    });

  });
  </script>
@endsection
