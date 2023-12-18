$(document).ready(function () {
    var codigo_input = $("#codigo_institucional")
    var mask = codigo_input.val() !== '' ? '00': '00-00-00-000';
    
    $("#input-codigo-institucional").mask(mask).attr('placeholder', mask);
    
    $("#codigo-checked").change(function() {
      if($("#codigo_institucional").val() !== '')
        return;
      
      var mask = $(this).prop("checked") ? '00-000-00-00-000':'00-00-00-000'
      $("#input-codigo-institucional").mask(mask).attr('placeholder', mask)
    });
    //**************************************guardar  */
  
    $("#GuardaCodificacion").on("click", function () {  
      try {
        //if(!validation()) return;
        validation()

        let codigoA = null;
        if($("#codigo_institucional").val() !== '')
          codigoA = String( $('#input-codigo-institucional').val()+$('#label-codigo-institucional').html());
        else 
          codigoA = $('#input-codigo-institucional').val();
        console.log(codigoA)
        let fechaA = $("#fechaA").val(); //capturar los datos que tiene el input
        
        let encargadoA = $("#encargadoA").val();
        let ingresosA = $("#_id").val();
        let id_asignacion = $("#id_asignacion").val();
        let usuariosA = $("#nombreC").val();

        
        if (validation()) {  
          var formData = new FormData(); //permite recoger la data para enviarla al controlador

          formData.append("fechaA", fechaA);//anadir la data al objeto para seer enviadad
          formData.append("cod",codigoA);
          formData.append("encar",encargadoA);
          formData.append("_id",ingresosA);
          formData.append("id_asignacion",id_asignacion);
          formData.append("nombreC",usuariosA);

          $.ajax({
            url: "Controlador/CodificacionAF/insertCOA.php",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
              data = JSON.parse(response);
              console.log(data)
              if(typeof data.toast !== 'undefined' && typeof data.mensaje !== 'undefined'){
                toastBoostrap(data.toast, data.mensaje);
                $("input").val(null);
                $("#label-codigo-institucional").html(null);
                $("select").val('Elegir Jefe');
                limpiar();
              } else {
                //alert("Formato de imagen incorrecto.");
              }
            },
          });
        } else {
          //show_toast('danger', 'Error de validación', 'Debe llenar todos los campos requeridos');
          return false;
        }
      } catch (error) {
        console.log(error)
      }
    });
    //*************************** */



  /******inicio funcion validar */
  function validation() {
    let validate = true;
    // Validación de requeridos
    $(".codasig-validate").each(function (k, v) {
      console.log($(v).val());
      // Evaluo el valor en el campo y determino que no sea un valor nulo, indefinido, vacio, o con longitud menor a 1
      if ($(v).val() != null && typeof $(v).val() !== 'undefined' && $(v).val().trim() !== '') {
        // Si la condicion se cumple quitare la clase 'is-invalid' y agregare la clase 'is-valid'
        $(v).removeClass('is-invalid').addClass('is-valid');
        // Busco en el padre la clase msg-error y la elimino de mi componente html
        $(v).parent().find('.msg-error').remove();
      } else {
        // Remuevo la clase 'is-valid' y agrego la clase 'is-invalid'
        $(v).removeClass('is-valid').addClass('is-invalid');
        // Creamos un component small y lo agregamos a nuestra variables html
        const html = '<small class="text-danger msg-error">El campo es requerido</small>';
        // Buscamos en nuestro componente padre la clase 'msg-error' y la removemos
        $(v).parent().find('.msg-error').remove();
        $(v).parent().append(html);
        validate = false;
      }
    });

    return validate;
  }

  function limpiar() {
    $(".codasig-validate").each(function (k, v) {
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