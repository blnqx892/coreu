<?php
// Incluir el archivo que contiene la configuración de la conexión a la base de datos
include("../../Confi/conexion.php");

// Establecer conexión a la base de datos
$conexion = con();

    $nombreCate=$_POST["nombreCate"];
    $vidaUtil=$_POST["vidaUtil"];
    $fechaCreacion = date('Y-m-d H:i:s');

    $sql = "INSERT INTO categorias (categoria, fecha_creacion, vida_util) VALUES ('$nombreCate', '$fechaCreacion','$vidaUtil')";
    $resultado = mysqli_query($conexion, $sql);

    $json = array();
if ($resultado) {
    $json[] = array(
        'success'=>1,
        'title' => 'Exito',
        'mensaje'=>'Registro Guardado con exito!'
    );
} else {
    $json[] = array(
        'title' => "Error",
        'mensaje'=>"Surgió un error!"
    );
}

$jsonstring = json_encode($json[0]);
echo $jsonstring;
?>
