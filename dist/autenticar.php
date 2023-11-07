<?php
include("Confi/conexion.php");
require_once('alertas.php');
$conexion = con();
session_start();

$usuario = (isset($_POST['username'])) ? $_POST['username'] : '';
$contra = (isset($_POST['password'])) ? $_POST['password'] : '';

$sql="SELECT u.*, r.rol FROM usuarios u inner join roles r on u.fk_rol = r.id WHERE usuario='$usuario'";
$consulta=mysqli_query($conexion,$sql) or die ("ERROR AL CONECTAR CON LA BASE DE DATOS ".mysqli_connect_error());
if ($row=mysqli_fetch_assoc($consulta)) {
    $md5=$row['contrasena'];
    if (password_verify($contra,$md5)) {
        $_SESSION['usuarioActivo']=$row;

        // Mostrar la alerta de éxito
        $alerta = new Alerta('success', '¡Bienvenido!', 'Has iniciado sesión correctamente.');
        $alerta->mostrar();
        // Redireccionar a la página
        header("Location: index.php");
    } else {
        // Mostrar la alerta de error
        $alerta = new Alerta('danger', '¡Error de inicio de sesión!', 'El usuario o la contraseña no son correctos.');
        $alerta->mostrar();

        // Redireccionar a la página
        header("Location: Acceso.php");
    }
} else {
    // Mostrar la alerta de error
    $alerta = new Alerta('danger', '¡Usuario no existe!', 'El usuario no existe en la base de datos.');
    $alerta->mostrar();

    // Redireccionar a la página
    header("Location: Acceso.php");
}

          //////////CAPTURA DATOS PARA BITACORA
          $usuari=$_SESSION['usuarioActivo'];
          $nom=$usuari['nombre']. ' ' .$usuari['apellido'];
          $sql = "INSERT INTO bitacora (evento,usuario,fecha_creacion) VALUES ('Inicio Sesión','$nom',now())";
          mysqli_query($conexion,$sql) or die ("Error a Conectar en la BD guardo bita".mysqli_connect_error());
          ///////////////////////////////////////////////


?>
