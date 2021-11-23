$(document).ready(function(){
  $.ajax({
    type: 'POST',
    url: 'php/cargar_listas.php'
  })
  .done(function(listas_rep){
    $('#genero').html(listas_rep)
  })
  .fail(function(){
    alert('Hubo un errror al cargar las listas_rep')
  })
