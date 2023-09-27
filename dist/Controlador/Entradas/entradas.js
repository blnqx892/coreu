$(document).ready(function () {
   
  const toast = new coreui.Toast(document.getElementById('liveToast'));

  
    //********************guardar  */
  
    $("#GuardaEntradas").on("click", function () {

      validation();
      var fecha = $("#fechaC").val();
      var factura = $("#facturaC").val();
      var costo = $("#costoC").val();
      var prov = $("#proveedor_id").val();
      var nombre = $("#nombreC").val();
      var serie = $("#serieC").val();
      var marca = $("#marcaC").val();
      var modelo = $("#modeloC").val();
      var color = $("#colorC").val();
      var cargo = $("#cargoC").val();
      var vida= $("#vidaC").val();
      var cate = $("#categoria_id").val();
      var descrip = $("#descriC").val();
      var numerom = $("#motorC").val();
      var numerocha = $("#chasisC").val();
      var numerop = $("#placaC").val();
      var capaci = $("#capacidadC").val();
      if($("#flexSwitchCheckChecked").val()=="on"){
        var bandera=0;
      }else{
        var bandera=1;
      }

      // if ( $("#fechaC").val() == "" || $("#facturaC").val() == "" || $("#costoC").val() == "" ||
      //   $("#proveedor_id").val() == "" ||  $("#nombreC").val() == "" || $("#colorC").val() == "" || 
      //   $("#cargoC").val() == "" || $("#categoria_id").val() == "" ||
      //   $("#descriC").val() == "") {
      //     Swal.fire({
      //       icon: "error",
      //       title: "error",
      //       text: "Campos Vacios",
      //     });
      
      //   }else if($("#flexSwitchCheckChecked").val()=="on" &&($("#motorC").val() == "" || 
      //   $("#chasisC").val() == "" || $("#placaC").val() == "" ||  $("#capacidadC").val() == "")){
      
      //   Swal.fire({
      //     icon: "error",
      //     title: "error",
      //     text: "Campos Vacios",
      //   });
      // } else {
      if(validation(1)){

  


        var formData = new FormData(); //permite recoger la data para enviarla al controlador

        formData.append("fecha", fecha);//anadir la data al objeto para seer enviadad
        formData.append("factura",factura);
        formData.append("costo",costo);
        formData.append("prove",prov);
        formData.append("nombre",nombre)
        formData.append("serie",serie)
        formData.append("marca",marca);
        formData.append("modelo",modelo);
        formData.append("color",color)
        formData.append("cargo",cargo)
        formData.append("vida",vida);
        formData.append("cate",cate)
        formData.append("descri",descrip)
        formData.append("numeromo",numerom)
        formData.append("numerochasis",numerocha)
        formData.append("numeropla",numerop);
        formData.append("capa",capaci)
        formData.append("bandera",bandera)
        
        
  
        $.ajax({
          url: "Controlador/Entradas/insertEntradas.php",
          type: "post",
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
          console.log(JSON.parse(response));
            data = JSON.parse(response);
            if (data.success == 1) {
              // Swal.fire({
              //   icon: "success",
              //   title: data.title,
              //   text: data.mensaje,
              // });
              show_toast('success', 'Registro guardado', 'Acción exitosa');
               
             
               $("#formE")[0].reset();
               limpiar(1);
              // window.location.reload();
              
  
            } else {
              //alert("Formato de imagen incorrecto.");
            }
          },
        });
       
      }else{
        show_toast('danger', 'Error de validación', 'Debe llenar todos los campos requeridos');
      }
      return false;
    });
    //*************************** */
  /******inicio funcion validar */
  function validation (index) {
    let validate = true;

    // Validación de requeridos
    $(".mi-validate-"+index).each(function (k, v) {
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

  function limpiar(index){
    $(".mi-validate-"+index).each(function (k, v) {
    
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