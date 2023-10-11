$(document).ready(function () {

    mostrarMovimientos();
      
      function mostrarMovimientos() {
        tabla = jQuery("#moviactivo").DataTable({
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
              url: "Controlador/MantenimientoAF/mostrarmovitabla.php",
              method: "GET",
              dataSrc: function (json) {
                console.log(json);
                return json;
              },
            },
            columns: [
              { data: "i" },
              { data: "fecha" },
              { data: "codigo del bien" },
              { data: "descripcion del bien" },
              { data: "Tipo de Movimiento" }, 
              { data: "Tipo de Registro" }, 
              { data: "botones" }
             
      
            ],
          });
        }
      
        function refrescarTable() {//para editar o otras acciones
          tabla.ajax.url("Controlador/MantenimientoAF/mostrarmovitabla.php").load();
        }

        
 
  
  //----------------------------- mostrar-------------------------------------------------
      
  $("#moviactivo").on("click", ".vermo-item", function () {
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
