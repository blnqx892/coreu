<?php 
function conectarMysql(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sicafi";
    
    // Crear una conexión
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Comprobar la conexión
    if (!$conn) {
        die("La conexión ha fallado: " . mysqli_connect_error());
    }
}
?>