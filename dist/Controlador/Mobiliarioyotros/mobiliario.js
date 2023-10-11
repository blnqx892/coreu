$(document).ready(function () {
  
  const toast = new coreui.Toast(document.getElementById('liveToast'));
    //**************************************guardar  */
  
    $("#GuardaMobiliario").on("click", function () {

     
      validation();
      let fechaM = $("#fecham").val(); //capturar los datos
      let nombreM = $("#nomm").val();
      let modeloM = $("#modelm").val();
      let valorM = $("#valom").val();
      let descriM = $("#descrim").val();
     
      
    
  
     // if ( $("#fecham").val() == "" || $("#nomm").val() == "" || $("#modelm").val() == "" ||
     //   $("#valom").val() == "" ||$("#descrim").val() == "") {
     //     Swal.fire({
    //       icon: "error",
    //         title: "error",
   //         text: "Campos Vacios",
  //      });
  //   } else {
if (validation(1)) {

        let formData = new FormData(); //permite recoger la data para enviarla al controlador

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
              // Swal.fire({
             //  icon: "success",
             //   title: data.title,
             //   text: data.mensaje,
             // });
               
             show_toast('success', 'Registro guardado', 'Acción exitosa');

               $("#formmo")[0].reset();
               limpiar(1);
  
            } else {
              //alert("Formato de imagen incorrecto.");
            }
          },
        });
      } else {
        show_toast('danger', 'Error de validación', 'Debe llenar todos los campos requeridos');
      }
        return false;
    });
    //*************************** */
    //*************************** */
  /******inicio funcion validar */

  function validation(index) {
    let validate = true;

// Validación de requeridos
   $(".dos-validate-" + index).each(function (k, v) {
    console.log(v);
    if ($(v).val() != null && $(v).val() !== undefined && $(v).val() !== '') {
      $(v).removeClass('is-invalid').addClass('is-valid');
      $(v).parent().find('.msg-error').remove();
    } else {
      $(v).removeClass('is-valid').addClass('is-invalid');
      const html = '<small class="text-danger msg-error">El campo es requerido</small>';
      $(v).parent().find('.msg-error').remove();
      $(v).parent().append(html);
      validate = false;
    }
  });

  return validate;
  }

  function limpiar(index) {
    $(".dos-validate-" + index).each(function (k, v) {

      $(v).removeClass('is-valid');


    });

  }
  /********************fin funcion validar */
  function show_toast(severity, title, body) {
    $("#liveToast").removeClass('text-bg-success text-bg-danger').addClass('text-bg-' + severity);
    $("#toast_title").html(title);
    $("#toast_body").html(body);
    toast.show();
  }
  
  });