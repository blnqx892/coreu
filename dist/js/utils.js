$(document).on('click', '#generar', function (evento) {
    evento.preventDefault(); 
    console.log("bien");
    let tabla=document.getElementById("miTabla");
    let fila = $(this).closest("tr");
      let data = tabla.row(fila).data();
      console.log(data);
    JsBarcode("#contenedorCodigoBarras", "Hi world!",{
        displayValue: false,
      });
});

