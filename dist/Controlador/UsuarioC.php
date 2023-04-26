<?php 
include("../Confi/conexion.php");
$conexion = con();

$bandera = $_POST["bandera"];
if ($bandera=="Guardar") {
    $nombre = $_POST["nombreC"];
    $apellido = $_POST["apellidoC"];
    $usuario = $_POST["usuarioC"];
    $rol = $_POST["rolC"];
    $email = $_POST["emailC"];
    $contra= $_POST["contraC"];
    $sql = "INSERT INTO usuarios (nombre,apellido,usuario,email,contrasena,rol) VALUES ('$nombre', '$apellido','$usuario','$email','$contra','$rol')";
  
    // Ejecutar la consulta SQL
if (mysqli_query($conexion, $sql)) {
    echo "Los datos se han insertado correctamente";
} else {
    echo "Error al insertar los datos: ". mysqli_error($conexion);
}
}
?>