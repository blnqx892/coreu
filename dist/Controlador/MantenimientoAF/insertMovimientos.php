<?php
    session_start();
    // Incluir el archivo que contiene la configuración de la conexión a la base de datos
    include("../../Confi/conexion.php");

    // Incluir el archivo que contiene funciones de validación (por ejemplo, funciones como dangerJSON, successJSON, warningJSON)
    include("../../Confi/validacion.php");
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
        // Mostrar mensaje de éxito
        successJSON('Registro guardado con éxito.');
    } catch (Exception $e) {
        // Manejar excepciones durante la ejecución del procedimiento almacenado
        dangerJSON($e);
    } finally {
        // Cerrar la conexión después de ejecutar el procedimiento almacenado
        mysqli_close($conexion);
    }

    //////////CAPTURA DATOS PARA BITACORA
    $conexion = con();
    $usuari=$_SESSION['usuarioActivo'];
    $nom=$usuari['nombre']. ' ' .$usuari['apellido'];
    $sql1 = "INSERT INTO bitacora (evento,usuario,fecha_creacion) VALUES ('Se ejecuto un movimiento en activo fijo','$nom',now())";
    mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD guardo bita".mysqli_connect_error());
    //////////////////////////////////////////
?>
