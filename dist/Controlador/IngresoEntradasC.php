<?php 
include("../Confi/conexion.php");
$conexion = con();

$bandera = $_POST["bandera"];
if ($bandera=="Guardar") {
    $fecha = $_POST["fechaC"];
    $factura = $_POST["facturaC"];
    $costo = $_POST["costoC"];
    $prov = $_POST["proveC"];
    $nombre = $_POST["nombreC"];
    $serie = $_POST["serieC"];
    $marca = $_POST["marcaC"];
    $modelo = $_POST["modeloC"];
    $color = $_POST["colorC"];
    $cargo = $_POST["cargoC"];
    $vida= $_POST["vidaC"];
    $cate = $_POST["cateC"];
    $descrip = $_POST["descriC"];
    $sql = "INSERT INTO ingreso_entradas (fecha_adquisicion,numero_factura,costo_adquisicion,nombre_adquisicion,
    serie_adquisicion,marca,modelo,color,descripcion_adquisicion,cargo,vida_util,fk_categoria,fk_proveedores) VALUES 
    ('$fecha','$factura', '$costo','$nombre','$serie','$marca','$modelo','$color','$descrip','$cargo','$vida','$cate','$prov')";
  
    // Ejecutar la consulta SQL
if (mysqli_query($conexion, $sql)) {
    echo "Los datos se han insertado correctamente";
} else {
    echo "Error al insertar los datos: ". mysqli_error($conexion);
}
}
?>
