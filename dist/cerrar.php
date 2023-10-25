<?php
include("Confi/conexion.php");
$conexion = con();

    session_start(); //Iniciar una nueva sesión o reanudar la existente

    //////////CAPTURA DATOS PARA BITACORA
    $usuari=$_SESSION['usuarioActivo'];
    $nom=$usuari['nombre']. ' ' .$usuari['apellido'];
    $sql = "INSERT INTO bitacora (evento,usuario,fecha_creacion) VALUES ('Cerro Sesión','$nom',now())";
    mysqli_query($conexion,$sql) or die ("Error a Conectar en la BD guardo bita".mysqli_connect_error());
    ///////////////////////////////////////////////
    session_destroy(); //Destruye la sesión
    header('location: /coreu/dist/Acceso.php'); //Redirecciona la inicio
?>
