<?php
include("../../Confi/conexion.php");
$conexion = con();

$nombreUnid = $_POST["nombreUnid"];
$id = $_POST['_id'];

$sql = "UPDATE unidades SET nombre_unidad='$nombreUnid' WHERE id = '$id'";
//var_dump($sql); /* para que pruebes por qué el error */
// Ejecutar la consulta SQL
$resultado = mysqli_query($conexion, $sql);

$json = array();
if ($resultado) {
    $json[] = array(
        'success' => 1,
        'title' => 'Éxito',
        'mensaje' => '¡Registro guardado con éxito!'
    );
} else {
    $json[] = array(
        'title' => "Error",
        'mensaje' => "¡Surgió un error!"
    );
}
$jsonstring = json_encode($json[0]);
echo $jsonstring;
?>