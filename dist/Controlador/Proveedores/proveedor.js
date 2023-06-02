$(document).ready(function () {

  combo();



  function combo() {
    $.ajax({
      url: "Controlador/Proveedores/mostrar.php",
      type: "GET",
      success: function (response) {
        //console.log(JSON.parse(response));
        const item = JSON.parse(response);
        let template = '<option selected="" disabled="" value="">Elegir Proveedor</option>';
        item.forEach((item) => {
          template += `
          <option value="${item.id}">${item.name}</option>
                  `;
        });
        $("#proveedor_id").html(template);
      },
    });
  } //fin de mostrar en el combo



  //**************************************guardar adenda */

  $("#GuardaProveedor").on("click", function () {
    var formData = new FormData();
    var nombreProv = $("#nombreProv").val();

    if (
      $("#nombreProv").val() == ""
    ) {
      Swal.fire({
        icon: "error",
        title: "error",
        text: "Campos Vacios",
      });
    } else {
      formData.append("nombreProv", nombreProv);

      $.ajax({
        url: "Controlador/Proveedores/insertProveedor.php",
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
             combo();
             $('#nombreProv').val('');
            //$('#modalProv').hide();

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
