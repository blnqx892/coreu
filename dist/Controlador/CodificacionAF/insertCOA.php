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

    // Obtener valores del formulario
    $id_asignacion_activos  = intval($_POST["id_asignacion"] ?? '');
    $fecha_asignacion       = $_POST["fechaA"];
    $codigo_institucional   = $_POST["cod"];
    $encargado_bien         = $_POST["encar"];
    $fk_ingreso_entradas    = $_POST["_id"];
    $fk_usuarios            = $_POST["nombreC"];


    if (validacionSql("SELECT VALIDAR('VALIDAR_CODIGO_ACTIVO', '$codigo_institucional') AS resultado")) {
        // Mostrar mensaje de advertencia si el código ya existe
        warningJSON('El código de institucional de activo fijo ya existe.');
        return;
    }

    // Establecer una nueva conexión para el procedimiento almacenado
    $conexion = con();

    // Llamar al procedimiento almacenado para el traslado definitivo
    $sql = "CALL TRASLADO_DEFINITIVO_MOVIMIENTO(
        $id_asignacion_activos,
        '$fecha_asignacion',
        '$codigo_institucional',
        '$encargado_bien',
        $fk_ingreso_entradas,
        $fk_usuarios
    )";

    try {
        // Ejecutar el procedimiento almacenado
        $resultado = mysqli_query($conexion, $sql);

         //Regitramos evento en la bitacora
         bitacora("Se Codifico el bien $codigo_institucional");

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
