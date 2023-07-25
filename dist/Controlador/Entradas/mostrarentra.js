$(document).ready(function () {

  mostrarEntradas();
    
    function mostrarEntradas() {
      tabla = jQuery("#entra").DataTable({
        language: {
            decimal: ".",
            emptyTable: "No hay datos para mostrar",
            info: "Del _START_ al _END_ (_TOTAL_ total)",
            infoEmpty: "Del 0 al 0 (0 total)",
            infoFiltered: "(Filtrado de todas las _MAX_ entradas)",
            infoPostFix: "",
            thousands: "'",
            lengthMenu: "Mostrar _MENU_ entradas",
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            search: "Buscar:",
            zeroRecords: "No hay resultados",
            paginate: {
              first: "Primero",
              last: "Último",
              next: "Siguiente",
              previous: "Anterior",
            },
            aria: {
              sortAscending: ": Ordenar de manera Ascendente",
              sortDescending: ": Ordenar de manera Descendente ",
            },
          },
          pagingType: "full_numbers",
          lengthMenu: [
            [5, 10, 20, 25, 50, -1],
            [5, 10, 20, 25, 50, "Todos"],
          ],
          iDisplayLength: 5,
          responsive: true,
          autoWidth: true,
          deferRender: true,
          ajax: {
            url: "Controlador/Entradas/mostrarE.php",
            method: "GET",
            dataSrc: function (json) {
              console.log(json);
              return json;
            },
          },
          columns: [
            { data: "i" },
            { data: "fechaC" },
            { data: "facturaC" },
            { data: "nombreC" },
            { data: "marca" },
            { data: "cate" },
            { data: "botones" }
           
    
          ],
        });
      }
    
      function refrescarTable() {//para editar o otras acciones
        tabla.ajax.url("Controlador/Entradas/mostrarE.php").load();
      }

 //------------------------edit mostrar-----------------------------------------------
      
  $("#entra").on("click", ".edite-item", function () {
    let id = $(this).attr("id-item-e");
     $("#_id").val('');
     $("#_id").val(id);
   
     $("#modale").modal("show");
      var formData = new FormData();

    formData.append("id", id);
  
    //otro ajax
     $.ajax({
      url: "Controlador/Entradas/mostrar_modalE.php",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(JSON.parse(response));
        data = JSON.parse(response);

        if(data.mostrar_campos ==1){
            $("#ocultar").show();
        }else{
          $("#ocultar").hide();

        }
       
        //console.log(data);
        $("#_id").val(data.id);
        $("#fechaee").val(data.fechaC);
        $("#fact").val(data.facturaC);
        $("#cost").val(data.costo);
        $("#proveedor_id").val(data.proved);
        $("#nombree").val(data.nombreC);
        $("#seriee").val(data.serie);
        $("#marcae").val(data.marca);
        $("#modeloe").val(data.modelo);
        $("#colore").val(data.color);
        $("#cargoe").val(data.cargo);
        $("#vidae").val(data.vida);
        $("#categoria_id").val(data.cated);
        $("#descripe").val(data.descri);
        $("#motore").val(data.numeromo);
        $("#placae").val(data.numeropla);
        $("#chasise").val(data.numerochasis);
        $("#capae").val(data.capa);
       
        
        Swal.fire({
          icon: "info",
          title: "Datos Cargados Correctamente!",
          text: "Información lista para ser modificada",
        });

        edit = true;
      },
    });
  });
//------------------------- fin edit mostrar------------------------------------------

//----------------------------- mostrar-----------------------------------------------
      
    $("#entra").on("click", ".vere-item", function () {
      let id = $(this).attr("id-item-vere");
      $("#_id").val('');
      $("#_id").val(id);
    
       $("#modalVer").modal("show");
      var formData = new FormData();
  
      formData.append("id", id);
     
      //otro ajax
       $.ajax({
        url: "Controlador/Entradas/mostrar_modalE.php",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
          console.log(JSON.parse(response));

          data = JSON.parse(response);
          if(data.mostrar_campos ==1){
            $("#ocultarver").show();
        }else{
          $("#ocultarver").hide();
  
        }  
         //console.log(data);
          $("#_id").val(data.id);
          $("#fechae").val(data.fechaC);
          $("#factu").val(data.facturaC);
          $("#cos").val(data.costo);
          $("#id_proveedor").val(data.prove);
          $("#nombre").val(data.nombreC);
          $("#serie").val(data.serie);
          $("#marca").val(data.marca);
          $("#modelo").val(data.modelo);
          $("#color").val(data.color);
          $("#cargo").val(data.cargo);
          $("#vida").val(data.vida);
          $("#id_categoria").val(data.cate);
          $("#descrip").val(data.descri);
          $("#motor").val(data.numeromo);
          $("#placa").val(data.numeropla);
          $("#chasis").val(data.numerochasis);
          $("#capa").val(data.capa);
  
          edit = true;
        },
      });
    });
 //------------------------- fin mostrar----------------------------------------------------



//*lo movi para aqui para poder acceder al metodo que recarga la tabla

    $("#edite").on("click", function () {
          
       var fecha = $("#fechaee").val(); //capturar los datos
       var factura = $("#fact").val();
       var costo = $("#cost").val();
       var proved = $("#proveedor_id").val();
       var nombre = $("#nombree").val();
       var serie = $("#seriee").val();
       var marca = $("#marcae").val();
       var modelo = $("#modeloe").val();
       var color =  $("#colore").val();
       var cargo = $("#cargoe").val();
       var vida =  $("#vidae").val();
       var cated =  $("#categoria_id").val();
       var descrip = $("#descripe").val();
       var numerom = $("#motore").val();
       var numerop = $("#placae").val();
       var numerocha = $("#chasise").val();
       var capaci = $("#capae").val();
       var id      = $("#_id").val(); //aqui capturas
        
      if ( $("#fechaee").val() == "" || $("#fact").val() == "" || $("#cost").val() == "" ||
           $("#id_proveedore").val() == "" ||  $("#nombree").val() == "" || $("#marcae").val() == "" ||
           $("#colore").val() == "" ||  $("#cargoe").val() == "" || $("#id_categoriae").val() == "" ||
           $("#descripe").val() == "") {
        
                Swal.fire({
                  icon: "error",
                  title: "error",
                  text: "Campos Vacios",
                });
              } else {
                
      var formData = new FormData(); //permite recoger la data para enviarla al controlador
        
      formData.append("fechaC", fecha);//anadir la data al objeto para seer enviadad
      formData.append("facturaC",factura);
      formData.append("costo",costo);
      formData.append("prove",proved);
      formData.append("nombreC",nombre)
      formData.append("serie",serie)
      formData.append("marca",marca);
      formData.append("modelo",modelo);
      formData.append("color",color)
      formData.append("cargo",cargo)
      formData.append("vida",vida);
      formData.append("cate",cated)
      formData.append("descri",descrip)
      formData.append("numeromo",numerom)
      formData.append("numerochasis",numerocha)
      formData.append("numeropla",numerop);
      formData.append("capa",capaci)
      formData.append("_id",id ); 
      //el campo booleano? eso era mi duda que te dije que si tenia que ir aunque no se editara o se iba a editar elestdo
      //pera error mio
        //para que no te perdas lo deje comentado
          
                $.ajax({
                  url: "Controlador/Entradas/editarE.php",
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
                       
                     
                      //$("#form")[0].reset();
                      $("#modale").modal("hide");
                      refrescarTable();//recarga la tabla en el momento
                       
                      
          
                    } else {

                    }
                  },
                });
                return false;
              }
            });
            //*************************** */


//-------------------------------EDITARRRRR
$("#entra").on("click", ".edite-item", function () {
  let id = $(this).attr("id-item-e");
  $("#_id").val(id);

    $("#modale").modal("show");
  var formData = new FormData();

  formData.append("id", id);

  //otro ajax
    $.ajax({
    url: "Controlador/Entradas/mostrar_modalE.php",
    type: "post",
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      console.log(JSON.parse(response));
      data = JSON.parse(response);
      //console.log(data);
      $("#_id").val(data.id);
      $("#fechaee").val(data.fechaC);
      $("#fact").val(data.facturaC);
      $("#cost").val(data.costo);
      $("#id_proveedore").val(data.prove);
      $("#nombree").val(data.nombreC);
      $("#seriee").val(data.serie);
      $("#marcae").val(data.marca);
      $("#modeloe").val(data.modelo);
      $("#colore").val(data.color);
      $("#cargoe").val(data.cargo);
      $("#vidae").val(data.vida);
      $("#id_categoriae").val(data.cate);
      $("#descripe").val(data.descri);
      $("#motore").val(data.numeromo);
      $("#chasise").val(data.numerochasis);
      $("#placae").val(data.numeropla);
      $("#capae").val(data.capa);
      
      
      
      Swal.fire({
        icon: "info",
        title: "Datos Cargados Correctamente!",
        text: "Información lista para ser modificada",
      });

      edit = true;
    },
  });
});
//------------------------- fin edit mostrar

          
//*lo movi para aqui para poder acceder al metodo que recarga la tabla
$("#edite").on("click", function () {
                 
  var fecha = $("#fechaee").val(); //capturar los datos
  var factura = $("#fact").val();
  var costo = $("#cost").val();
  var prov = $("#id_proveedore").val();
  var nombre = $("#nombree").val();
  var serie = $("#seriee").val();
  var marca = $("#marcae").val();
  var modelo = $("#modeloe").val();
  var color =  $("#colore").val();
  var cargo = $("#cargoe").val();
  var vida =  $("#vidae").val();
  var cate =  $("#id_categoriae").val();
  var descrip = $("#descripe").val();
  var numerom = $("#motore").val();
  var numerocha = $("#chasise").val();
  var numerop = $("#placae").val();
  var capaci = $("#capae").val();
  var id      = $("#_id").val(); //aqui capturas
        
  if ( $("#fechaee").val() == "" || $("#fact").val() == "" || $("#cost").val() == "" ||
  $("#id_proveedore").val() == "" ||  $("#nombree").val() == "" || $("#marcae").val() == "" ||
  $("#colore").val() == "" ||  $("#cargoe").val() == "" || $("#id_categoriae").val() == "" ||
  $("#descripe").val() == "") {

       Swal.fire({
         icon: "error",
         title: "error",
         text: "Campos Vacios",
       });
     } else {

var formData = new FormData(); //permite recoger la data para enviarla al controlador
      
      formData.append("_id",id ); 
      formData.append("fechaC", fecha);//anadir la data al objeto para seer enviadad
      formData.append("facturaC",factura);
      formData.append("costo",costo);
      formData.append("prove",prov);
      formData.append("nombreC",nombre)
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
      
  //para que no te perdas lo deje comentado
        
              $.ajax({
                url: "Controlador/Entradas/editarE.php",
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
                    
                  
                   // $("#form")[0].reset();
                    $("#modale").modal("hide");
                    refrescarTable();//recarga la tabla en el momento
                    //proba
                    
        
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
  