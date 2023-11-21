<?php
	require '../Confi/confu.php';
  include '../Confi/funcs.php';

	$user_id = $mysqli->real_escape_string($_POST['user_id']);
	$token = $mysqli->real_escape_string($_POST['token']);
	$password = $mysqli->real_escape_string($_POST['password']);
  $con_password = $mysqli->real_escape_string($_POST['con_password']);

  if(validaPassword($password, $con_password))
	{

		$pass_hash = hashPassword($password);

		if(cambiaPassword($pass_hash, $user_id, $token))
		{
			echo "Contraseña Modificada <br> <a href='../Acceso.php' >Iniciar Sesion</a>";
			} else {

			echo "Error al modificar contraseña";

		}

		} else {

		echo 'Las contraseñas no coinciden';

	}


?>
