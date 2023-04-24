<?php 
include("../Confi/conexion.php");
$conexion = conectarMysql();

$bandera = $_POST["bandera"];

if ($bandera=="GuardarIngresoEntradas") {
    $fecha = $_POST["fechaC"];
    $factura = $_POST["facturaC"];
    $costo = $_POST["costoC"];
    $sql = "INSERT INTO ingreso_entradas (fecha_adquisicion,numero_factura,costo_adquisicion) VALUES 
	('$fecha','$factura','$costo')";

mysqli_query($conexion,$sql) or die ("Error no conectai".mysqli_connect_error());

}
?>