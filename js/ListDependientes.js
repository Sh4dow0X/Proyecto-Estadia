$(document).ready(function(){
  $.ajax({
    type: 'POST',
    url: 'php/listEstado.php'
  })
  .done(function(listas_rep){
    $('#ListEstado').html(listas_rep)
  })
  .fail(function(){
    alert('Hubo un errror al cargar las listas de estados')
  })

  $(document).ready(function(){
    //var id = $('#ListEstado').val()
    $.ajax({
      type: 'POST',
      url: 'php/listMunicipio.php',
      //data: {'id': id}
    })
    .done(function(getMunicipio){
      $('#Listdelegacion').html(getMunicipio)
    })
    .fail(function(){
      alert('Hubo un errror al cargar los vídeos')
    })
  })

 $(document).ready(function(){
    //var id = $('#ListEstado').val()
    $.ajax({
      type: 'POST',
      url: 'php/listColonia.php',
      //data: {'id': id}
    })
    .done(function(getMunicipio){
      $('#ListColonia').html(getMunicipio)
    })
    .fail(function(){
      alert('Hubo un errror al cargar los vídeos')
    })
  })

})