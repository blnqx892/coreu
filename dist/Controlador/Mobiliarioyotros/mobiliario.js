$(document).ready(function () {
  

    //**************************************guardar  */
  
    $("#GuardaMobiliario").on("click", function () {

     

      var fecham = $("#fecham").val(); //capturar los datos
      var nomm = $("#nomm").val();
      var modelom = $("#modelom").val();
      var valorm = $("#valorm").val();
      var descrim = $("#descrim").val();
      
    
  
      if ( $("#fecham").val() == "" || $("#nomm").val() == "" || $("#modelom").val() == "" ||
        $("#valorm").val() == "" ||$("#descrim").val() == "") {

        Swal.fire({
          icon: "error",
          title: "error",
          text: "Campos Vacios",
        });
      } else {
        var formData = new FormData(); //permite recoger la data para enviarla al controlador

        formData.append("fecha", fecham);//anadir la data al objeto para seer enviadad
        formData.append("nombre",nomm);
        formData.append("modelo",modelom);
        formData.append("valor",valorm);
        formData.append("descripcion",descrim)
  
        $.ajax({
          url: "Controlador/Mobiliarioyotros/insertmobiliario.php",
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
               
             
               $("#formm")[0].reset();
              
  
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