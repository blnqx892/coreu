<?php
session_start();
include("../../Confi/conexion.php");
$conexion = con();

    $id    = $_POST["id"];



    $sql= " UPDATE usuarios SET estado='Inactivo' WHERE id = '$id'";
   //var_dump($sql); /*para que proves porq el error */
    //////////CAPTURA DATOS PARA BITACORA
    $usuari=$_SESSION['usuarioActivo'];
    $nom=$usuari['nombre']. ' ' .$usuari['apellido'];
    $sql1 = "INSERT INTO bitacora (evento,usuario,fecha_creacion) VALUES ('Se dio de baja a un usuario','$nom',now())";
    mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD guardo bita".mysqli_connect_error());
///////////////////////////////////////////////

    // Ejecutar la consulta SQL
    $resultado    = mysqli_query($conexion, $sql);

    //echo "Los datos se han insertado correctamente";
    $json = array();
            if ($resultado) {
                $json[] = array(
                    'success'=>1,
                    'title' => 'Exito',
                    'mensaje'=>'Registro Guardado con exito!'
                  );
                 // echo 1;
            } else {
                $json[] = array(
                    'title' => "Error",
                    'mensaje'=>"Surgió un error!"
                  );
            }
           $jsonstring = json_encode($json[0]);
           echo $jsonstring;
?>
