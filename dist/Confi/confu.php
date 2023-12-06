<?php

	$mysqli=new mysqli("sicafi-ues.com", "f296809_blanca", "@*eIv6G(w)Hn", "f296809_sicafi");
	//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos

	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}

?>
