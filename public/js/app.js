$(document).ready(function(){
    $('.collapsible').collapsible();
    $('.sidenav').sidenav();
    $('select').select();

    $('.date').mask('00/00/0000');
    $('.rg').mask('000.000.000', {reverse: true});
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.phone').mask('(00) 90000-0000');

    $('.datepicker').datepicker({
      format: 'dd/mm/yyyy',
      yearRange: 50,
      i18n: {
        today: 'Hoje',
        clear: 'Limpar',
        done: 'Ok',
        nextMonth: 'Próximo mês',
        previousMonth: 'Mês anterior',
        weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
        weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
        weekdays: ['Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado'],
        monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro']
      }
    });

});
