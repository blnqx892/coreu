<?php 
include("../Confi/conexion.php");
$conexion = con();

$bandera = $_POST["bandera"];
if ($bandera=="GuardarIngreso") {
    $fecha = $_POST["nombre"];
    $costo = $_POST["edad"];
    $sql = "INSERT INTO usuario (nombre,edad) VALUES ('$fecha', '$costo')";
  
    // Ejecutar la consulta SQL
if (mysqli_query($conexion, $sql)) {
    echo "Los datos se han insertado correctamente";
} else {
    echo "Error al insertar los datos: ". mysqli_error($conexion);
}
}
?>
