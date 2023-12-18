<?php
	require 'Confi/confu.php';
	include 'Confi/funcs.php';

  echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
  echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>';
  echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';

    session_start();

	$errors = array();

	if(!empty($_POST))
	{
		$email = $mysqli->real_escape_string($_POST['email']);
		if(emailExiste($email))
		{
			$user_id = getValor('id', 'email', $email);
			$nombre = getValor('nombre', 'email', $email);
      $apellido = getValor('apellido', 'email', $email);

    
			$token = generaTokenPass($user_id);


			$url = 'http://'.$_SERVER["SERVER_NAME"].'/coreu/dist/Recuperar/cambia.php?user_id='.$user_id.'&token='.$token;

			$asunto = 'Recuperar Contraseña - Sistema de Usuarios';
			$cuerpo = "Hola, $nombre $apellido<br />
			Recientemente se ha solicitado reestablecer la contraseña.
			<br/> Si ud no lo ha solicitado, por favor, ignore este mensaje. Caducara en 2 horas.
			<br/><p>Para reestablecer tu contraseña, por favor visite la siguiente URL: <br/> <a href='$url'>$url</a>
			<br/><br/> Atentamente: <br/> El equipo de SICAFI";
      //var_dump(enviarEmail($email, $nombre, $asunto, $cuerpo));
			if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
        echo
        "<script language='javascript'>
            $(document).ready(function () {
                setTimeout(function () {
                    Swal.fire({
                        title: 'Correo enviado',
                        text: 'Se ha enviado un correo electrónico a $email con instrucciones para recuperar tu contraseña.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.value) {
                            window.location='../index.php';
                        }
                    })
                }, 1000);
            });
        </script>";
			}
			} else {
        echo
        "<script language='javascript'>
            $(document).ready(function () {
                setTimeout(function () {
                    Swal.fire({
                        title: 'Advertencia',
                        text: 'La dirección de correo electrónico no existe',
                        icon: 'warning',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.value) {
                            window.location='../index.php';
                        }
                    })
                }, 1000);
            });
        </script>";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
  <title>Acceso a SICAFI</title>
  <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="assets/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!-- Vendors styles-->
  <link rel="stylesheet" href="vendors/simplebar/css/simplebar.css">
  <link rel="stylesheet" href="css/vendors/simplebar.css">
  <!-- Main styles for this application-->
  <link href="css/style.css" rel="stylesheet">

</head>

<body>
  <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card-group d-block d-md-flex row">
            <div class="card col-md-7 p-4 mb-0">
              <div class="card-body">
                <center>
                  <h1>RECUPERAR CONTRASEÑA</h1>
                </center>
                <p class="text-medium-emphasis">Correo Electrónico</p>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                  <div class="input-group mb-3">
                    <span class="input-group-text">
                      <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open">
                        </use>
                      </svg>
                    </span>
                    <input class="form-control" type="email" placeholder="Correo Electrónico" name="email" id="email">
                    <span id="email-error" style="color: red;"></span>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <button class="btn btn-primary px-4" type="submit">Enviar</button>
                    </div>
                    <div class="col-6 text-end">
                      <a href="../index.php" class="btn btn-link px-0" >Volver</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
