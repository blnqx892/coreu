$(document).ready(function () {
  
  
  
    //********************guardar  */
  
    $("#GuardaMovimientos").on("click", function () {

      let fechaMovimiento = $("#fecha_movimiento").val();
      let nombre_u        = $("#unidad_id").val();
      let tipomovi        = $("#perC").val();
      let observa         = $("#observacion").val();
      let _id_asigna      = $("#codigo_id :selected").val();

      if ( 
        $("#descriC").val() == "") {
          Swal.fire({
            icon: "error",
            title: "error",
            text: "Campos Vacios",
          });
      
        }else if(
          $("#flexSwitchCheckChecked").val()=="on" &&
          ($("#motorC").val() == "" || $("#chasisC").val() == "" || $("#placaC").val() == "" ||  
          $("#capacidadC").val() == "")
        ){
      
        Swal.fire({
          icon: "error",
          title: "error",
          text: "Campos Vacios",
        });
      } else {


        var formData = new FormData(); //permite recoger la data para enviarla al controlador
       
        formData.append("fechaMovimiento", fechaMovimiento);//anadir la data al objeto para seer enviadad
        formData.append("observa",observa);
        formData.append("tipomovi",tipomovi);
        formData.append("_id_asigna",_id_asigna)       
        formData.append("nombre_u",nombre_u)
  
        $.ajax({
          url: "Controlador/MantenimientoAF/insertMovimientos.php",
          type: "post",
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
            $("#codigo_id").select2().text();
            $('#formM').get(0).reset();
          },
        });
       
      }
      return false;
    });
    //*************************** */

  
  });