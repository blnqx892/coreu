$(document).ready(function () {
  

    //**************************************guardar  */
  
    $("#GuardaMobiliario").on("click", function () {

     

      var fechaM = $("#fecham").val(); //capturar los datos
      var nombreM = $("#nomm").val();
      var modeloM = $("#modelm").val();
      var valorM = $("#valom").val();
      var descriM = $("#descrim").val();
      var fechaM = $("#fecham").val();
      
    
  
      if ( $("#fecham").val() == "" || $("#nomm").val() == "" || $("#modelm").val() == "" ||
        $("#valom").val() == "" ||$("#descrim").val() == "") {

        Swal.fire({
          icon: "error",
          title: "error",
          text: "Campos Vacios",
        });
      } else {
        var formData = new FormData(); //permite recoger la data para enviarla al controlador

        //anadir la data al objeto para seer enviadad
        formData.append("nombre",nombreM);
        formData.append("modelo",modeloM);
        formData.append("valor",valorM);
        formData.append("descripcion",descriM)
        formData.append("fecha", fechaM);
  
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