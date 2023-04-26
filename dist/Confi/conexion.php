<?php

function con(){
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "sicafi";

    $con = mysqli_connect($server,$user,$pass) or die ("Error a Conectar en la BD".mysqli_connect_error());
    mysqli_select_db($con, $db) or die ("Error a Conectar en la BD".mysqli_connect_error());
    return $con;
}
// Variables de conexión
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sicafi";

// Conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
echo "Conexión exitosa"; */
?>