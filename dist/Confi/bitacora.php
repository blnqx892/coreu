<?php

function bitacora($mensaje){
    try {
        // Iniciamos la conexión a la BD
        $conexion = con();
    
        // Validar la existencia de la sesión y obtener el usuario activo
        if (isset($_SESSION['usuarioActivo'])) {
            $user = $_SESSION['usuarioActivo'];
            $userNombreApellido = $user['nombre'] . ' ' . $user['apellido'];
    
            // Crear sentencia preparada para la inserción en la bitácora
            $sql = "INSERT INTO bitacora (evento, usuario) VALUES (?, ?)";
            $stmt = mysqli_prepare($conexion, $sql);
    
            // Vincular parámetros
            mysqli_stmt_bind_param($stmt, "ss", $mensaje, $userNombreApellido);
    
            // Ejecutar la sentencia preparada
            mysqli_stmt_execute($stmt);
    
            // Cerrar la sentencia preparada
            mysqli_stmt_close($stmt);
        } else {
            // Manejar el caso en que la sesión o usuarioActivo no exista
            throw new Exception("Sesión no iniciada o usuario no encontrado");
        }
    } catch (Exception $e) {
        // Manejar excepciones durante la ejecución
        dangerJSON($e);
    } finally {
        // Cerrar la conexión después de ejecutar la consulta
        if ($conexion) {
            mysqli_close($conexion);
        }
    }
    
}

?>