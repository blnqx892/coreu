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


$prov = $_POST["prove"];
$nombre = $_POST["nombreC"];
$serie = $_POST["serie"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$color = $_POST["color"];
$numerom = $_POST["numeromo"];
$numerocha = $_POST["numerochasis"];
$numerop = $_POST["numeropla"];
$capaci = $_POST["capa"];
$id    = $_POST["_id_inventario"];


$sql= "UPDATE asignacion_activo
INNER JOIN ingreso_entradas on ingreso_entradas.id = asignacion_activo.fk_ingreso_entradas
SET
  fk_proveedores='$prov',
  nombre_adquisicion='$nombre',
  serie_adquisicion='$serie',
  numero_motor='$numerom',
  numero_chasis='$numerocha',
  numero_placa='$numerop',
  capacidad='$capaci',
  marca='$marca',
  modelo='$modelo',
  color='$color'
WHERE asignacion_activo.id='$id'";

      try {
              
        // Ejecutar el procedimiento almacenado
        $resultado = mysqli_query($conexion, $sql);
    
        //Regitramos evento en la bitacora
        bitacora("Se Modificó el activo $nombre en inventario");
    
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
