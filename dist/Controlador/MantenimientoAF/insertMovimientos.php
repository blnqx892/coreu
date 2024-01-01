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

    $fechaM               = $_POST["fechaMovimiento"];
    $observacionM         = $_POST["observa"] ;
    $tipoMovimiento       = $_POST["tipomovi"] ;
    $fk_asignacion_activo = $_POST["_id_asigna"] ?? '';
    $fk_unidades          = $_POST["nombre_u"] ?? '';
    $tipoRegistro         = $_POST["tiporegis"] ?? null;

    $sql = "call INSERT_MANTENIMIENTO_DESCARGO(
        '$fechaM',
        '$observacionM',
        '$tipoMovimiento',
        '$tipoRegistro',
        '$fk_asignacion_activo',
        '$fk_unidades'
    );";

    try {
        // Ejecutar el procedimiento almacenado
        $resultado = mysqli_query($conexion, $sql);


        //Regitramos evento en la bitacora
          bitacora("Se Ejecutó movimiento de  $tipoMovimiento");

        // Mostrar mensaje de éxito
        successJSON('Registro guardado con éxito.');
    } catch (Exception $e) {
        // Manejar excepciones durante la ejecución del procedimiento almacenado
        dangerJSON($e);
    } finally {
        // Cerrar la conexión después de ejecutar el procedimiento almacenado
        mysqli_close($conexion);
    }

    
?>
