$(document).ready(function () {

  mostrarUsuarios();
    
    function mostrarUsuarios() {
      tabla = jQuery("#miTablaUsuarios").DataTable({
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
            url: "Controlador/Usuarios/mostarU.php",
            method: "GET",
            dataSrc: function (json) {
              return json;
            },
          },
          columns: [
            { data: "i" },
            { data: "nom" },
            { data: "ape" },
            { data: "usu" },
            { data: "estado" },
            { data: "botones" }
           
    
          ],
        });
      }
    
      function refrescarTable() {//para editar o otras acciones
        tabla.ajax.url("Controlador/Usuarios/mostarU.php").load();
      }

      //------------------------edit mostrar
      
  $("#miTablaUsuarios").on("click", ".edit-item", function () {
    let id = $(this).attr("id-item");
    $("#_id").val(id);
   
     $("#modalEditar").modal("show");
    var formData = new FormData();

    formData.append("id", id);
  
    //otro ajax
     $.ajax({
      url: "Controlador/Usuarios/mostrar_modal.php",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(JSON.parse(response));
        data = JSON.parse(response);
        //console.log(data);
        $("#_id").val(data.id);
        $("#nombre").val(data.nom);
        $("#rolC").val(data.rol);
        $("#apellido").val(data.ape);
        $("#usuario").val(data.usu);
        $("#email").val(data.email);
        $("#con").val(data.contra);
        $("#contra1").val(data.contra);
       
        
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

      $("#edit").on("click", function () {
        //ya vistes el error? eso es
        //si ese es el modal editar o no
        //si
        
              var nombreC = $("#nombre").val(); //capturar los datos
              var apellidoC = $("#apellido").val();
              var usuario = $("#usuario").val();
              var rolC = $("#rolC").val();
              var emailC = $("#email").val();
              var contraC = $("#con").val();
              var id      = $("#_id").val(); //aqui capturas
        
              //mas claro? si
              //todo bien solo esos pequeños detalles pero me alegro que los has intentado
              //ahora ya podes mas
        
              //hay que cerrarlo
            
          
              if ( $("#nombreC").val() == "" || $("#apellidoC").val() == "" || $("#usuario").val() == "" ||
                $("#rolC").val() == "" ||
                $("#emailC").val() == "" ||
                $("#contraC").val() == "" ) {
        
                Swal.fire({
                  icon: "error",
                  title: "error",
                  text: "Campos Vacios",
                });
              } else {
                var formData = new FormData(); //permite recoger la data para enviarla al controlador
        
                formData.append("nombreC", nombreC);//anadir la data al objeto para seer enviadad
                formData.append("ape",apellidoC);
                formData.append("usu",usuario);
                formData.append("rol",rolC);
                formData.append("email",emailC);
                formData.append("contra",contraC);
                formData.append("contra",contraC);
                formData.append("_id",id ); 
                //para que no te perdas lo deje comentado
          
                $.ajax({
                  url: "Controlador/Usuarios/editar.php",
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
                       
                     
                       $("#form")[0].reset();
                      $("#modalEditar").modal("hide");
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


//-------------------------------EDITARRRRR
$("#miTablaUsuarios").on("click", ".edit-item", function () {
  let id = $(this).attr("id-item");
  $("#_id").val(id);

    $("#modalEditar").modal("show");
  var formData = new FormData();

  formData.append("id", id);

  //otro ajax
    $.ajax({
    url: "Controlador/Usuarios/mostrar_modal.php",
    type: "post",
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      console.log(JSON.parse(response));
      data = JSON.parse(response);
      //console.log(data);
      $("#_id").val(data.id);
      $("#nombre").val(data.nom);
      $("#rolC").val(data.rol);
      $("#apellido").val(data.ape);
      $("#usuario").val(data.usu);
      $("#email").val(data.email);
      $("#con").val(data.contra);
      $("#contra1").val(data.contra);
      
      
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

    //-----------DAR DE BAJA 
    $("#miTablaUsuarios").on("click", ".baja-item", function () {
      let id = $(this).attr("id-item-baja");
      $("#_id").val(id);

      /*alerta*/
      Swal.fire({
        title: "Dara de baja al usuario!",
        text: "¿Desea continuar con el proceso?",
        icon: 'warning',
        showCancelButton: true,
        allowOutsideClick: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'SI',
        cancelButtonText: 'NO'
        }).then((result) => {
        if (result.isConfirmed) {

          //si presiona el boton de si se ejecuta el ajax
          //aras un archivo php baja.php donde solo vas actualizar el estado

  var formData = new FormData();

  formData.append("id", id);
    
      //otro ajax
       $.ajax({
        url: "Controlador/Usuarios/baja_usuario.php",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
          refrescarTable();//recarga la tabla en el momento
            Swal.fire({
            icon: "success",
            title: "Has dado de baja al usuario!",
            text: "Usuario dado de baja",
          });

        },
      });//fin ajax

          //*fin
           
        } 
        });

      /**fin alerta */   
    
      
    });
    
    //----------------FIN DAR DE BAJA 

    //-----------DAR DE ALTA
    $("#miTablaUsuarios").on("click", ".alta-item", function () {
      let id = $(this).attr("id-item-alta");
      
      $("#_id").val(id);

      /*alerta*/
      Swal.fire({
        title: "Dara de alta al usuario!",
        text: "¿Desea continuar con el proceso?",
        icon: 'warning',
        showCancelButton: true,
        allowOutsideClick: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'SI',
        cancelButtonText: 'NO'
        }).then((result) => {
        if (result.isConfirmed) {

          //si presiona el boton de si se ejecuta el ajax
          //aras un archivo php baja.php donde solo vas actualizar el estado

      var formData = new FormData();
  
      formData.append("id", id);
    
      //otro ajax
       $.ajax({
        url: "Controlador/Usuarios/alta_usuario.php",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
          refrescarTable();//recarga la tabla en el momento 
          Swal.fire({
            icon: "success",
            title: "Has dado de alta al usuario!",
            text: "Usuario dado de alta",
          });

        },
      });//fin ajax

          //*fin
           
        } 
        });

      /**fin alerta */   
    
      
    });
    
    //----------------FIN DAR DE ALTA

          
                //*lo movi para aqui para poder acceder al metodo que recarga la tabla
$("#edit").on("click", function () {
                 
  var nombreC = $("#nombre").val(); //capturar los datos
  var apellidoC = $("#apellido").val();
  var usuario = $("#usuario").val();
  var rolC = $("#rolC").val();
  var emailC = $("#email").val();
  var contraC = $("#con").val();
  var id      = $("#_id").val(); //aqui capturas
                  
                       
                      
                                
    if ( $("#nombreC").val() == "" || $("#apellidoC").val() == "" || $("#usuario").val() == "" ||
      $("#rolC").val() == "" ||
      $("#emailC").val() == "" ||
      $("#contraC").val() == "" ) {
                              
              Swal.fire({
                icon: "error",
                title: "error",
                text: "Campos Vacios",
              });
            } else {
              var formData = new FormData(); //permite recoger la data para enviarla al controlador
      
              formData.append("nombreC", nombreC);//anadir la data al objeto para seer enviadad
              formData.append("ape",apellidoC);
              formData.append("usu",usuario);
              formData.append("rol",rolC);
              formData.append("email",emailC);
              formData.append("contra",contraC);
              formData.append("contra",contraC);
              formData.append("_id",id ); 
              //para que no te perdas lo deje comentado
        
              $.ajax({
                url: "Controlador/Usuarios/editar.php",
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
                    
                  
                    $("#form")[0].reset();
                    $("#modalEditar").modal("hide");
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
  