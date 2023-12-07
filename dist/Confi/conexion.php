<?php

function con(){
   //$server = "localhost";
   //$user = "root";
   //$pass = "";
   //$db = "sicafi";

$server = "localhost";
$user = "f296809_blanca";
$pass = "@*eIv6G(w)Hn";
$db = "f296809_sicafi";

   $con = mysqli_connect($server, $user, $pass) or die ("Error a Conectar en la BD".mysqli_connect_error());
   mysqli_select_db($con, $db) or die ("Error a Conectar en la BD".mysqli_connect_error());
   return $con;
}

$conexion = con();

?>