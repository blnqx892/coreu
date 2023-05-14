<?php 
include("../Confi/conexion.php");
$conexion = con();

$bandera = $_POST["bandera"];
if ($bandera=="Guardar") {
    $fecha = $_POST["fechaC"];
    $factura = $_POST["facturaC"];
    $costo = $_POST["costoC"];
    $nombre = $_POST["nombreC"];
    $serie = $_POST["serieC"];
    $marca = $_POST["marcaC"];
    $modelo = $_POST["modeloC"];
    $color = $_POST["colorC"];
    $vida= $_POST["vidaC"];
    $descrip = $_POST["descriC"];
    $sql = "INSERT INTO ingreso_entradas (fecha_adquisicion,numero_factura,costo_adquisicion,serie_adquisicion,
    marca,modelo,color,descripcion_adquisicion,vida_util) VALUES ('$fecha','$factura', '$costo','$nombre','$serie',
    '$marca','$modelo','$color','$descrip','$vida')";
  
    // Ejecutar la consulta SQL
if (mysqli_query($conexion, $sql)) {
    echo "Los datos se han insertado correctamente";
} else {
    echo "Error al insertar los datos: ". mysqli_error($conexion);
}
}
?>
