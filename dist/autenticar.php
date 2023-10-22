<?php
include("Confi/conexion.php");

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
        echo"
        <script language='javascript'>
        alert('BIENVENIDO')
        type: 'danger'
        window.location='index.php'
        </script>";
    }else {
        echo"
        <script language='javascript'>
        alert('USUARIO O CONTRASEÑA INCORRECTA, VUELVE A INTENTARLO')
        type: 'danger'
        window.location='Acceso.php'
        </script>";
    }
}else {
    echo"
    <script language='javascript'>
    alert('EL USUARIO NO ESTA REGISTRADO')
    type: 'danger'
    window.location='Acceso.php'
    </script>";
}
?>
