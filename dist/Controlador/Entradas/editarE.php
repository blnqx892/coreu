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

  $fecha = $_POST["fechaC"];
  $factura = $_POST["facturaC"];
  $costo = $_POST["costo"];
  $prov = $_POST["prove"];
  $nombre = $_POST["nombreC"];
  $serie = $_POST["serie"];
  $marca = $_POST["marca"];
  $modelo = $_POST["modelo"];
  $color = $_POST["color"];
  $cargo = $_POST["cargo"];
  $vida= $_POST["vida"];
  $cate = $_POST["cate"];
  $descrip = $_POST["descri"];
  $numerom = $_POST["numeromo"];
  $numerocha = $_POST["numerochasis"];
  $numerop = $_POST["numeropla"];
  $capaci = $_POST["capa"];
  $id    = $_POST["_id"];

    // Crea un objeto DateTime a partir de la cadena original
  //$fechaObjeto = DateTime::createFromFormat('d-m-Y', $fecha);

  // Formatea la fecha en el formato 'Y-m-d'
  //$fechaFormateada = $fechaObjeto->format('Y-m-d');

  $sql= "UPDATE ingreso_entradas
  SET fecha_adquisicion='$fecha',
      numero_factura='$factura',
      costo_adquisicion='$costo',
      fk_proveedores='$prov',
      nombre_adquisicion='$nombre',
      serie_adquisicion='$serie',
      marca='$marca',
      modelo='$modelo',
      color='$color',
      cargo='$cargo',
      vida_util='$vida',
      fk_categoria='$cate',
      descripcion_adquisicion='$descrip',
      numero_motor='$numerom',
      numero_chasis='$numerocha',
      numero_placa='$numerop',
      capacidad='$capaci'
  WHERE id = '$id'";
  
  try {
              
    // Ejecutar el procedimiento almacenado
    $resultado = mysqli_query($conexion, $sql);

    //Regitramos evento en la bitacora
    bitacora("Se Modificaron los datos de  $nombre");

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
