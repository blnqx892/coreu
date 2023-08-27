
$(document).ready(function () {
  $(".js-example-basic-single").select2();
 
  combo();

  function combo() {
    $.ajax({
      url: "Controlador/MantenimientoAF/mostrarcodigoscombo.php",
      type: "GET",
      success: function (response) {
        //console.log(JSON.parse(response));
        const item = JSON.parse(response);
        let template = '<option  selected disabled="" value="">Buscar Codigo </option>';
        item.forEach((item) => {
          template += `
          <option value="${item.id}">${item.name}</option>
                  `;
        });
        $("#codigo_id").html(template);
      },
    });
  } 

 
  $("#perC").on('change', function() {
    movimiento()
  });

  $("#codigo_id").on('change', function() {   
    cargarDatos()   
  });

  function cargarDatos(){
    var buscar=$("#codigo_id :selected").val();//el id seleccionado
    var formData = new FormData();

    formData.append("codigo",buscar);
    movimiento()
    $.ajax({
      url: "Controlador/MantenimientoAF/mostrarCampos.php",
     type: "post",
     data: formData,
     contentType: false,
     processData: false,
     success: function (response) {
       data = JSON.parse(response);
       
       $("#nombre_adquisicion").val(data.nombre_adquisicion);
       $("#costo_adquisicion").val(data.costo_adquisicion);
       $("#vida_util").val(data.vida_util);
       $("#color").val(data.color);
       $("#modelo").val(data.modelo);
       $("#serie_adquisicion").val(data.serie_adquisicion);
       $("#marca").val(data.marca);
       $("#codigo_institucional").val(data.codigo_institucional);
       $("#nombre_unidad").val(data.nombre_unidad);
     },
   });//fin ajax
  }

  function movimiento (){
    let _id = $("#codigo_id :selected").val();
    let _codigo = $("#codigo_id :selected").text();
    let _traslado = $("#perC").val();
   
    if(!(_codigo ?? false) ||!(_id ?? false) || !(_traslado ?? false) || _traslado !=='Traslado Definitivo')
    {
      console.log('Error en :codigo o traslado o id')
      return;
    }

    _codigo = _codigo.replaceAll('-', '');
    //Abrir nuevo tab
    var win = window.open('/coreu/dist/AsignaciondeActivo.php?a='+_id+'&codigo='+_codigo+'&traslado='+_traslado, '_blank');
   //Cambiar el foco al nuevo tab (punto opcional)
    win.focus();

  }


  //fin de mostrar en el combo





 
  });