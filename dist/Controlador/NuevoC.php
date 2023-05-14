<?php 
include("../Confi/conexion.php");
$conexion = con();

$bandera = $_POST["bandera"];

if ($bandera=="Guardar1") {
    $nombrePro=$_POST["nombreProv"];
    $sql = "INSERT INTO proveedores (proveedor) VALUES ('$nombrePro')";
  
    // Ejecutar la consulta SQL
if (mysqli_query($conexion, $sql)) {
    //echo "Los datos se han insertado correctamente";
    header("location: /Coreu/dist/IngresoEntradas.php");
} else {
    echo "Error al insertar los datos: ". mysqli_error($conexion);
}
}
if ($bandera=="Guardar2") {
    $nombreCat=$_POST["nombreCate"];
    $sql = "INSERT INTO categorias (categoria) VALUES ('$nombreCat')";
  
    // Ejecutar la consulta SQL
if (mysqli_query($conexion, $sql)) {
    //echo "Los datos se han insertado correctamente";
    header("location: /Coreu/dist/IngresoEntradas.php");
} else {
    echo "Error al insertar los datos: ". mysqli_error($conexion);
}
}
?>