<?php
session_start();
// Incluir el archivo que contiene la configuración de la conexión a la base de datos
include("../../Confi/conexion.php");

// Incluir el archivo que contiene funciones de validación (por ejemplo, funciones como dangerJSON, successJSON, warningJSON)
include("../../Confi/validacion.php"); 
 
//Incluir el archivo que contine la funcion de bitacora
include("../../Confi/bitacora.php");

// Establecer conexión a la base de datos
$conexion = con();

    $nombre = $_POST["nombreC"];
    $apellido = $_POST["ape"];
    $usuario = $_POST["usu"];
    $rol = $_POST["rol"];
    $uni  = $_POST["unid"];
    $email = $_POST["email"];
   // $contra= $_POST["contra"];
    $id    = $_POST["_id"];


    $sql= " UPDATE usuarios SET nombre='$nombre',apellido='$apellido',usuario='$usuario', fk_rol='$rol',email='$email',
     fk_unidades='$uni' WHERE id = '$id'";

    try {
              
      // Ejecutar el procedimiento almacenado
      $resultado = mysqli_query($conexion, $sql);
  
      //Regitramos evento en la bitacora
      bitacora("Se Modificó la información del usuario  $nombre");
  
      // Mostrar mensaje de éxito
      successJSON('Registro editado con éxito.');
    } catch (Exception $e) {
      // Manejar excepciones durante la ejecución del procedimiento almacenado
      dangerJSON($e);
    } finally {
      // Cerrar la conexión después de ejecutar el procedimiento almacenado
      mysqli_close($conexion);
    }
  
?>
