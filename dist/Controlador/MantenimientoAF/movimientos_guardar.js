$(document).ready(function () {
  
  
  
    //********************guardar  */
  
    $("#GuardaEntradas").on("click", function () {

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
        var bandera=1;
      }else{
        var bandera=0;
      }

      if ( $("#fechaC").val() == "" || $("#facturaC").val() == "" || $("#costoC").val() == "" ||
        $("#proveedor_id").val() == "" ||  $("#nombreC").val() == "" || $("#colorC").val() == "" || 
        $("#cargoC").val() == "" || $("#categoria_id").val() == "" ||
        $("#descriC").val() == "") {
          Swal.fire({
            icon: "error",
            title: "error",
            text: "Campos Vacios",
          });
      
        }else if($("#flexSwitchCheckChecked").val()=="on" &&($("#motorC").val() == "" || 
        $("#chasisC").val() == "" || $("#placaC").val() == "" ||  $("#capacidadC").val() == "")){
      
        Swal.fire({
          icon: "error",
          title: "error",
          text: "Campos Vacios",
        });
      } else {


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
              Swal.fire({
                icon: "success",
                title: data.title,
                text: data.mensaje,
              });
               
             
               $("#formE")[0].reset();
              
  
            } else {
              //alert("Formato de imagen incorrecto.");
            }
          },
        });
       
      }
      return false;
    });
    //*************************** */

  
  });