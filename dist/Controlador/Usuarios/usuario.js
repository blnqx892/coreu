$(document).ready(function () {
  

    //**************************************guardar  */
  
    $("#GuardaUsuarios").on("click", function () {

     

      var nombreC = $("#nombreC").val(); //capturar los datos
      var apellidoC = $("#apellidoC").val();
      var usuario = $("#usuarioC").val();
      var rolC = $("#rolC").val();
      var uni= $("#unidad_id").val();
      var emailC = $("#emailC").val();
      var contraC = $("#contraC").val();
    
  
      if ( $("#nombreC").val() == "" || $("#apellidoC").val() == "" || $("#usuario").val() == "" ||
        $("#rolC").val() == "" ||$("#unidad_id").val() == "" ||
        $("#emailC").val() == "" ||
        $("#contraC").val() == "" ) {

        Swal.fire({
          icon: "error",
          title: "error",
          text: "Campos Vacios",
        });
      } else {
        var formData = new FormData(); //permite recoger la data para enviarla al controlador

        formData.append("nombreC", nombreC);//anadir la data al objeto para seer enviadad
        formData.append("ape",apellidoC);
        formData.append("usu",usuario);
        formData.append("rol",rolC);
        formData.append("unid",uni);
        formData.append("email",emailC);
        formData.append("contra",contraC)
  
        $.ajax({
          url: "Controlador/Usuarios/insertUsuario.php",
          type: "post",
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
            console.log(JSON.parse(response));
            data = JSON.parse(response);
            if (data.success == 1) {
              Swal.fire({
                icon: "success",
                title: data.title,
                text: data.mensaje,
              });
               
             
               $("#form")[0].reset();
              
  
            } else {
              //alert("Formato de imagen incorrecto.");
            }
          },
        });
        return false;
      }
    });
    //*************************** */

 
  
  
  });