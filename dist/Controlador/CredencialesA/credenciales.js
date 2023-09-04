$(document).ready(function () {
  
  
  combo();

  function combo() {
    $.ajax({
      url: "Controlador/CredencialesA/mostraruni.php",
      type: "GET",
      success: function (response) {
        //console.log(JSON.parse(response));
        const item = JSON.parse(response);
        let template = '<option value="">Elegir Unidad </option>';
        item.forEach((item) => {
          template += `
          <option value="${item.id}">${item.name}</option>
                  `;
        });
        $("#unidad_id").html(template);
      },
    });
  } 
  //fin de mostrar en el combo

 //**************************************guardar  */
  

 
  });