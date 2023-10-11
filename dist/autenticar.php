<?php
// Verifica si se han enviado datos de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $conexion =mysqli_connect("localhost", "root", "", "sicafi");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Obtener los valores del formulario
    $usuario = $_POST['username'];
    $contrasena = $_POST['password'];

    // Consulta SQL para verificar las credenciales
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
      
        // Verificar si se encontró una coincidencia
        if (mysqli_num_rows($resultado) == 1) {
            // Las credenciales son correctas, permitir el acceso
            session_start();
            $_SESSION['username'] = $usuario; // Iniciar sesión con el nombre de usuario
            header("Location: index.php"); // Redirigir al panel de control
            exit();
        } else {
            // Las credenciales son incorrectas, mostrar un mensaje de error
            echo "Nombre de usuario o contraseña incorrectos.";
        }
    } else {
        // Error en la consulta SQL
        echo "Error en la consulta: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>
