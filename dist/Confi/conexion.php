<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sicafi";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("La conexión falló: " . mysqli_connect_error());
}
echo "Conexión exitosa";
?>