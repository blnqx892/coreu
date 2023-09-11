$(document).ready(function () {

    combo();
    
    function combo() {
      $.ajax({
        url: "Controlador/Categorias/mostrarCa.php",
        type: "GET",
        success: function (response) {
          //console.log(JSON.parse(response));
          const item = JSON.parse(response);
          let template = '<option selected="" disabled="" value="">Elegir Categoria</option>';
          item.forEach((item) => {
            template += `
            <option value="${item.id}">${item.name}</option>
                    `;
          });
          $("#categoria_id").html(template);
        },
      });
    } //fin de mostrar en el combo



    //**************************************guardar  */

    $("#GuardaCategoria").on("click", function () {
      var formData = new FormData();
      var nombreCate = $("#nombreCate").val();
      var vidaUtil = $("#vidaUtil").val();
      if ($("#nombreCate").val() == "" && $("#vidaUtil").val() == "") {
        Swal.fire({
          icon: "error",
          title: "error",
          text: "Campos Vacios",
        });
      } else {
        formData.append("nombreCate", nombreCate);
        formData.append("vidaUtil", vidaUtil);
        $.ajax({
          url: "Controlador/categorias/insertCategoria.php",
          type: "post",
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {

            console.log(JSON.parse(response));
            data = JSON.parse(response);
            console.log('data',data);
            if (data.success == 1) {
              Swal.fire({
                icon: "success",
                title: data.title,
                text: data.mensaje,
              });
               combo();
               $('#nombreCate').val('');
               $('#vidaUtil').val('');
              //$('#modalCate').hide();

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
