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
            { data: "botones" }
           
    
          ],
        });
      }
    
      function refrescarTable() {//para editar o otras acciones
        tabla.ajax.url("Controlador/Usuarios/mostrarU.php").load();
      }
    
  
  
  
    
    
  
  
  
  
  });
  