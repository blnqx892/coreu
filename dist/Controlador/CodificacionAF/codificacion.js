$(document).ready(function () {
  

    //**************************************guardar  */
  
    $("#GuardaCodificacion").on("click", function () {

     

      var fechaA = $("#fechaA").val(); //capturar los datos que tiene el input
      var codigoA = ($("#codigoB-1").val() ?? '')+($("#codigoB-2").val() ?? '')+($("#codigoB-3").val() ?? '');
      var encargadoA = $("#encargadoA").val();
      var ingresosA = $("#_id").val();
      var usuariosA = $("#nombreC").val();

      
  
      if ( fechaA == "" || codigoA == "" || encargadoA == "" 
      || ingresosA == ""|| usuariosA == "") {

        Swal.fire({
          icon: "error",
          title: "error",
          text: "Campos Vacios",
        });
      } else {
        var formData = new FormData(); //permite recoger la data para enviarla al controlador

        formData.append("fechaA", fechaA);//anadir la data al objeto para seer enviadad
        formData.append("cod",codigoA);
        formData.append("encar",encargadoA);
        formData.append("_id",ingresosA);
        formData.append("nombreC",usuariosA);

  
        $.ajax({
          url: "Controlador/CodificacionAF/insertCOA.php",
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