$(function (evasometro) {
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
         data: [ { name: '15 a 19 anos', y: 43 }, { name: '20 a 24 anos', y: 29 }, { name: '25 a 29 anos', y: 18 }, { name: '30 a 34 anos', y: 6 }, { name: '35 a 39 anos', y: 3 }, { name: '40 anos ou mais', y: 1 }]
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
         data: [{ name: 'Feminino', y: 54 }, { name: 'Masculino', y: 46 }]
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
         data: [{ name: 'Branco', y: 44 }, { name: 'Pardo', y: 35 }, { name: 'Preto', y: 19 }, { name: 'Indigena', y: 1 }, { name: 'Quilombola', y: 1 }]
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
         data: [{ name: 'Quatro salários ou mais', y: 10 }, { name: 'Três salários', y: 16 }, { name: 'Dois salários', y: 25 }, { name: 'Um salário', y: 49 }]
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
         data: [ { name: 'Viúvo', y: 1 }, { name: 'Divorciado', y: 6 }, { name: 'Casado', y: 11 }, { name: 'Solteiro', y: 82 }]
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
          data: [4],
          dataLabels: {
              format: '<div style="text-align:center"><span style="font-size:25px;color:black">{y}</span><br/>' +
                      '<span style="font-size:12px;color:silver">Evasometro</span></div>'
          },
      }]
  });
});
