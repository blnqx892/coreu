var texto = "123456789";

// Selecciona el elemento HTML donde se mostrará el código de barras
var contenedorCodigoBarras = document.getElementById("barcode");

// Genera el código de barras utilizando la biblioteca JsBarcode
JsBarcode(contenedorCodigoBarras, texto, {
  format: "EAN13",
  displayValue: true
});