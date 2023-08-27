$(document).ready(function () {

    mostrarEntradas();
      
      function mostrarEntradas() {
        tabla = jQuery("#mobiliario").DataTable({
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
              url: "Controlador/Mobiliarioyotros/mostrar_mobiliario.php",
              method: "GET",
              dataSrc: function (json) {
                console.log(json);
                return json;
              },
            },
            columns: [
              { data: "i" },
              { data: "fecha" },
              { data: "nombre" },
              { data: "modelo" },
              { data: "valor" }, 
              { data: "estado" }, 
              { data: "botones" }
             
      
            ],
          });
        }
      
        function refrescarTable() {//para editar o otras acciones
          tabla.ajax.url("Controlador/Mobiliarioyotros/mostrar_mobiliario.php").load();
        }

        
 //------------------------edit mostrar-----------------------------------------------
      
  $("#mobiliario").on("click", ".editmo-item", function () {
    let id = $(this).attr("id-item-mo");
   // $("#_id").val('');
    $("#_id").val(id);
   
     $("#modalEditarmo").modal("show");
    var formData = new FormData();

    formData.append("id", id);
  
    //otro ajax
     $.ajax({
      url: "Controlador/Mobiliarioyotros/mostrarmodal_mobiliario.php",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(JSON.parse(response));
        data = JSON.parse(response);
        //console.log(data);
        $("#_id").val(data.id);
        $("#fechame").val(data.fecha);
        $("#nombreme").val(data.nombre);
        $("#modelome").val(data.modelo);
        $("#valorme").val(data.valor);
        $("#descrime").val(data.descrim);
        edit = true;
       
        
        Swal.fire({
          icon: "info",
          title: "Datos Cargados Correctamente!",
          text: "Información lista para ser modificada",
        });

        edit = true;
      },
    });
  });
  //------------------------- fin edit mostrar-------------------------------------

  
  //----------------------------- mostrar-------------------------------------------------
      
  $("#mobiliario").on("click", ".vermo-item", function () {
    let id = $(this).attr("id-item-vermo");
    $("#_id").val(id);
   
     $("#modalVermo").modal("show");
    var formData = new FormData();

    formData.append("id", id);
  
    //otro ajax
     $.ajax({
      url: "Controlador/Mobiliarioyotros/mostrarmodal_mobiliario.php",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(JSON.parse(response));
        data = JSON.parse(response);

        //console.log(data);
        $("#_id").val(data.id);
        $("#fecham").val(data.fecha);
        $("#nombrem").val(data.nombre);
        $("#modelom").val(data.modelo);
        $("#valorm").val(data.valor);
        $("#descrim").val(data.descrim);
        edit = true;
      },
    });
  });
//------------------------- fin  mostrar---------------------------------------------------


});
