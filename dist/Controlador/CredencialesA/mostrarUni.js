$(document).ready(function () {

    mostrarUnidades();
      
      function mostrarUnidades() {
        tabla = jQuery("#unidades").DataTable({
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
              url: "Controlador/CredencialesA/mostrartablaunid.php",
              method: "GET",
              dataSrc: function (json) {
                return json;
              },
            },
            columns: [
              { data: "i" },
              { data: "nomb" },
              { data: "botones" }
            ],
          });
        }
      
        function refrescarTable() {//para editar o otras acciones
          tabla.ajax.url("Controlador/CredencialesA/mostrartablaunid.php").load();
        }
  
   //------------------------edit mostrar------------------------------------------------
        
    $("#unidades").on("click", ".editu-item", function () {
      let id = $(this).attr("id-item-u");
      $("#_id").val(id);
     
           $("#modalEditarUni").modal("show");
           var formData = new FormData();
  
           formData.append("id", id);
    
      //otro ajax
       $.ajax({
        url: "Controlador/CredencialesA/mostrar_modalUni.php",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
          console.log(JSON.parse(response));
          data = JSON.parse(response);
          //console.log(data);
          $("#_id").val(data.id);
          $("#nombreediuni").val(data.nomb);
          
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
  
      //----------------------------- mostrar-------------------------------------------------
        
      $("#unidades").on("click", ".verun-item", function () {
        let id = $(this).attr("id-item-verun");
        $("#_id").val(id);
       
         $("#modalVerU").modal("show");
        var formData = new FormData();
    
        formData.append("id", id);
      
        //otro ajax
         $.ajax({
          url: "Controlador/CredencialesA/mostrar_modalUni.php",
          type: "post",
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
            console.log(JSON.parse(response));
            data = JSON.parse(response);
            //console.log(data);
            $("#_id").val(data.id);
            $("#nombreveruni").val(data.nomb);
            edit = true;
          },
        });
      });
//------------------------- fin  mostrar---------------------------------------------------
  
  
  
    //*lo movi para aqui para poder acceder al metodo que recarga la tabla
  
      $("#editunid").on("click", function () {
      
         var nombreUnid = $("#nombreediuni").val(); //capturar los datos
         var id      = $("#_id").val(); //aqui capturas
          
        if ( $("#nombreediuni").val() == "") {
          
                  Swal.fire({
                    icon: "error",
                    title: "error",
                    text: "Campos Vacios",
                  });
                } else {
                  
        var formData = new FormData(); //permite recoger la data para enviarla al controlador
           
            formData.append("nombreUnid", nombreUnid);//anadir la data al objeto para seer enviadad
            formData.append("_id",id ); 

          //para que no te perdas lo deje comentado
            
                  $.ajax({
                    url: "Controlador/CredencialesA/editaruni.php",
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
                      $("#modalEditarUni").modal("hide");
                      refrescarTable();//recarga la tabla en el momento
                         
                        
            
                      } else {
  
                      }
                    },
                  });
                  return false;
                }
              });
              //*************************** */
  
  
  //-------------------------------EDITARRRRR------------------------------------
  $("#unidades").on("click", ".editu-item", function () {
    let id = $(this).attr("id-item-u");
    $("#_id").val(id);
  
      $("#modalEditarUni").modal("show");
      var formData = new FormData();
  
      formData.append("id", id);
  
    //otro ajax
      $.ajax({
      url: "Controlador/CredencialesA/mostrar_modalUni.php",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(JSON.parse(response));
        data = JSON.parse(response);
        //console.log(data);
        $("#_id").val(data.id);
        $("#nombreediuni").val(data.nomb);
        
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
    
$("#editunid").on("click", function () {
                 
  var nombreUnid = $("#nombreediuni").val(); //capturar los datos
  var id      = $("#_id").val(); //aqui capturas
                  
                       
                      
                                
    if ( $("#nombreediuni").val() == "") {
                              
              Swal.fire({
                icon: "error",
                title: "error",
                text: "Campos Vacios",
              });
            } else {
      var formData = new FormData(); //permite recoger la data para enviarla al controlador
      
      formData.append("_id",id ); 
      formData.append("nombreUnid", nombreUnid);//anadir la data al objeto para seer enviadad
    
//para que no te perdas lo deje comentado
        
              $.ajax({
                url: "Controlador/CredencialesA/editarUni.php",
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
                    
                  
                    //$("#modalEditarUni")[0].reset();
                    $("#modalEditarUni").modal("hide");
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
    