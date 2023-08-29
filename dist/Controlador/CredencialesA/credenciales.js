$(document).ready(function () {
  
  
  combo();

  function combo() {
    $.ajax({
      url: "Controlador/CredencialesA/mostraruni.php",
      type: "GET",
      success: function (response) {
        //console.log(JSON.parse(response));
        const item = JSON.parse(response);
        let template = '<option value="">Elegir Unidad </option>';
        item.forEach((item) => {
          template += `
          <option value="${item.id}">${item.name}</option>
                  `;
        });
        $("#unidad_id").html(template);
      },
    });
  } 
  //fin de mostrar en el combo

 //**************************************guardar  */
  
    $("#GuardaUnidades").on("click", function () {
        var formData = new FormData();
        var nombreUnid = $("#nombreUnid").val();
    
        if (
          $("#nombreUnid").val() == "") {
          Swal.fire({
            icon: "error",
            title: "error",
            text: "Campos Vacios",
          });
        } else {
          formData.append("nombreUnid", nombreUnid);
    
          $.ajax({
            url: "Controlador/CredencialesA/insertCredenciales.php",
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

                //$("#modalUni")[0].reset();
                //$("#modalUni").modal("hide");
                $('#nombreUnid').val('');
    
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