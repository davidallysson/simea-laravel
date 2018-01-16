@extends('layouts.app')

@section('title')
  Consultar
@endsection

@section('content')
  <br>
  <div id="evasometro" style="width: 50%; height: 200px; float: right;"></div>
  <br>
  <div id="graficoSexo" style="width: 50%; height: 400px;"></div>
  <script type="text/javascript">
    $(function () {
      var graficoSexo = Highcharts.chart('graficoSexo', {
          chart: { type: 'pie' },
          title: { text: 'Porcentagem de Alunos por Sexo' },
          tooltip: { pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>' },
          plotOptions: {
              pie: {
                  allowPointSelect: true,
                  cursor: 'pointer',
                  dataLabels: {
                      enabled: true,
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
             data: [{ name: 'Feminino', y: 54 }, { name: 'Masculino', y: 46 }]
         }]
      });
      var graficoEvasometro = Highcharts.chart('evasometro', {
          chart: { type: 'solidgauge' },
          title: "Evasometro",
          pane: {
              center: ['50%', '85%'],
              size: '140%',
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
              title: {
                  text: 'Evasometro'
              },
              stops: [
                  [0.1, '#55BF3B'], // green
                  [0.5, '#DDDF0D'], // yellow
                  [0.9, '#DF5353'] // red
              ],
              lineWidth: 0,
              minorTickInterval: null,
              tickAmount: 2,
              title: { y: -70 },
              labels: { y: 16 }
          },
          plotOptions: {
              solidgauge: {
                  dataLabels: { y: 5, borderWidth: 0, useHTML: true }
              }
          },
          series: [{
              name: 'Evasometro',
              data: [8],
              dataLabels: {
                  format: '<div style="text-align:center"> <span style="font-size:25px;color:' +
                      ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><br/>' +
                         '<span style=" font-size:12px; color:silver">Evasometro</span></div>'
              },
          }]
      });
    });
  </script>
@endsection
