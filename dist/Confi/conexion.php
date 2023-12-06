<?php
$conexion = mysqli_connect("https://sicafi-ues.com/", "f296809_root", "*W4zm?Y=k,1K", "f296809_sicafi");

 function con(){
     $server = "https://sicafi-ues.com/";
     $user = "f296809_root";
     $pass = "*W4zm?Y=k,1K";
     $db = "f296809_sicafi";

     $con = mysqli_connect($server,$user,$pass) or die ("Error a Conectar en la BD".mysqli_connect_error());
     mysqli_select_db($con, $db) or die ("Error a Conectar en la BD".mysqli_connect_error());
     return $con;
}
?>
