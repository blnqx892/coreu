$(document).ready(function () {


  combo();

  function combo() {
    $.ajax({
      url: "Controlador/Movimientos/movimientoMostrar.php",
      type: "GET",
      success: function (response) {
        //console.log(JSON.parse(response));
        const item = JSON.parse(response);
        let template = '<option selected="" disabled="" value="">Seleccione tipo de movimiento</option>';
        item.forEach((item) => {
          template += `
          <option value="${item.id}">${item.name}</option>
                  `;
        });
        $("#movimiento1").html(template);
      },
    });
  } 
});
