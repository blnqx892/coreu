<?php
// Verifica si se han enviado datos de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $conexion =mysqli_connect("localhost", "root", "", "sicafi");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Obtener los valores del formulario
    $email = $_POST["email"];

    // Consulta SQL para verificar las credenciales
    $sql = "SELECT email FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado === false) {
      die("Error en la consulta: " . $conn->error);
    }
    if ($resultado->num_rows > 0) {
      // El email ingresado coincide con uno registrado en la base de datos
      echo "El email ingresado es válido";
    } else {
        // El email ingresado no coincide con ninguno registrado en la base de datos
        echo "El email ingresado no es válido";
        //como el email no es valido recarga la pantalla.
        header("Location: olvido_contrasena.php");
        exit;
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>
