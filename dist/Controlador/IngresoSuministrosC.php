<?php 

include("../Confi/conexion.php");
$conexion = con();

$bandera = $_POST["bandera"];
if ($bandera=="Guardar") {
    $fecha = $_POST["fecha"];
    $codigo = $_POST["codigo"];
    $codigob = $_POST["codigob"];
    $tarjeta = $_POST["tarjeta"];
    $stock = $_POST["stock"];
    $nombre = $_POST["nombre"];
    $marca = $_POST["marca"];
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["precio"];
    $unidad = $_POST["unidad"];
    $ubicacion = $_POST["ubicacion"];
    $descrip = $_POST["descrip"];
    $sql = "INSERT INTO ingreso_suministros (fecha_suministro,nombre_suministro,marca,cantidad,precio,descripcion,
    unidad_medida,numero_tarjeta,codigo,stock_suministros,ubicacion,codigo_barra) VALUES 
    ('$fecha','$nombre','$marca','$cantidad','$precio','$descrip','$unidad','$tarjeta','$codigo','$stock','$ubicacion','$codigob')";
  
    // Ejecutar la consulta SQL
if (mysqli_query($conexion, $sql)) {
    //echo "Los datos se han insertado correctamente";
    header("location: /Coreu/dist/AIngresoSuministros.php");
} else {
    echo "Error al insertar los datos: ". mysqli_error($conexion);
}
}
?>