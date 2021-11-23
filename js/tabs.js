$(document).ready(function(){
    $('#tabs1').hide();
    $('#tabs2').hide();

    $('#datos_grales').click(function(){
      $('#tabs1').show();
      $('#tabs2').hide();
    });

    $('#fila_espera').click(function(){
      $('#tabs1').hide();
      $('#tabs2').show();
    });
  });