  function mostrarContrasena(){
      var tipo = document.getElementById("Contrasena");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }