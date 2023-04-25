<?php 
include("../Confi/conexion.php");
$conexion = conectarMysql();

$bandera = $_POST["bandera"];
if ($bandera=="GuardarIngreso") {
    $fecha = $_POST["fechaC"];
    $costo = $_POST["costoC"];
    $sql = "INSERT INTO ingreso_entradas (fecha_adquisicion,costo_adquisicion) VALUES ('$fecha', '$costo')";
  
    // Ejecutar la consulta SQL
if (mysqli_query($conexion, $sql)) {
    echo "Los datos se han insertado correctamente";
} else {
    echo "Error al insertar los datos: ". mysqli_error($conexion);
}
}
?>
