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

    $id    = $_POST["id"];



    $sql= " UPDATE usuarios SET estado='Inactivo' WHERE id = '$id'";
   
try {
              
    // Ejecutar el procedimiento almacenado
    $resultado = mysqli_query($conexion, $sql);

    //Regitramos evento en la bitacora
    bitacora("Se dio de baja el usuario  $id");

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
