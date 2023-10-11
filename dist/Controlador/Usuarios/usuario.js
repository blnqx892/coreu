$(document).ready(function () {
  
  const toast = new coreui.Toast(document.getElementById('liveToast'));
    //**************************************guardar  */
  
    $("#GuardaUsuarios").on("click", function () {

     
      validation();
      var nombreC = $("#nombreC").val(); //capturar los datos
      var apellidoC = $("#apellidoC").val();
      var usuario = $("#usuarioC").val();
      var rolC = $("#rolC").val();
      var perC = $("#perC").val();
      var uni= $("#unidad_id").val();
      var emailC = $("#emailC").val();
      var contraC = $("#contraC").val();
    
  
      //if ( $("#nombreC").val() == "" || $("#apellidoC").val() == "" || $("#usuario").val() == "" ||
      //  $("#rolC").val() == "" ||$("#unidad_id").val() == "" ||
      //  $("#emailC").val() == "" ||
      //  $("#contraC").val() == "" ) {
      // Swal.fire({
      // icon: "error",
      //title: "error",
     //text: "Campos Vacios",
    //});
    // } else {

        if (validation(1)) {
          let  formData = new FormData(); //permite recoger la data para enviarla al controlador

        formData.append("nombreC", nombreC);//anadir la data al objeto para seer enviadad
        formData.append("ape",apellidoC);
        formData.append("usu",usuario);
        formData.append("rol",rolC);
        formData.append("per",perC);
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
              //Swal.fire({
              //icon: "success",
              //title: data.title,
              //text: data.mensaje,
              //});
               
              show_toast('success', 'Registro guardado', 'Acción exitosa');

               $("#form")[0].reset();
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
/******inicio funcion validar */
function validation(index) {
  let validate = true;
 // Validación de requeridos
 $(".tres-validate-" + index).each(function (k, v) {
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




//*************************** */
    function limpiar(index) {
      $(".tres-validate-" + index).each(function (k, v) {
  
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