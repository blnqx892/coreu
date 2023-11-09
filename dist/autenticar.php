<?php
include("Confi/conexion.php");
echo '
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>';
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
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
        echo 
        "<script language='javascript'>
            $(document).ready(function () {
                setTimeout(function () {
                    Swal.fire({
                        title: 'Bienvenido',
                        text: 'Haz iniciado sesión correctamente',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.value) {
                            window.location='index.php';
                        }
                    })
                }, 1000);
            });
        </script>";
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
