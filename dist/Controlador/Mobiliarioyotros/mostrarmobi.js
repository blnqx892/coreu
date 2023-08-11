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
              { data: "botones" }
             
      
            ],
          });
        }
      
        function refrescarTable() {//para editar o otras acciones
          tabla.ajax.url("Controlador/Mobiliarioyotros/mostrar_mobiliario.php").load();
        }
  
  //----------------------------- mostrar-------------------------------------------------
      
  $("#inven").on("click", ".vera-item", function () {
    let id = $(this).attr("id-item-vera");
    $("#_id").val(id);
   
     $("#modalVera").modal("show");
    var formData = new FormData();

    formData.append("id", id);
  
    //otro ajax
     $.ajax({
      url: "Controlador/InventarioAF/mostrar_modalinventa.php",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(JSON.parse(response));
        data = JSON.parse(response);
        if(data.mostrar_campos ==1){
          $("#ocultarverdatos").show();
      }else{
        $("#ocultarverdatos").hide();

      }  
        //console.log(data);
        $("#_id").val(data.id);
        $("#fechaa").val(data.fechaC);
        $("#codigoa").val(data.codigo_insti);
        $("#factua").val(data.facturaC);
        $("#costa").val(data.costo);
        $("#id_proveedor").val(data.prove);
        $("#nombrea").val(data.nombreaC);
        $("#marcaa").val(data.marca);
        $("#modeloa").val(data.modelo);
        $("#ubicaciona").val(data.nombre_unidad);
        $("#cargoa").val(data.cargo);
        $("#vidaa").val(data.vida_util);
        $("#id_categoria").val(data.cate);
        $("#descrip").val(data.descri);
        $("#motora").val(data.numeromo);
        $("#placaa").val(data.numeropla);
        $("#chasisa").val(data.numerochasis);
        $("#capaa").val(data.capa);
        edit = true;
      },
    });
  });
//------------------------- fin  mostrar---------------------------------------------------


});
