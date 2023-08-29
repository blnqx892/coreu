<?php
include("../../Confi/conexion.php");
$conexion = con();

      $fechaM=$_POST["fecham"];
      $nombreM=$_POST["nombrem"];
      $modeloM=$_POST["modelom"];
      $valorM=$_POST["valorm"];
      $descriM=$_POST["descrim"];
      $id    = $_POST["_id"];
    


    $sql= " UPDATE mobiliario_otros SET fecha='$fechaM',nombre='$nombreM',modelo='$modeloM',
    valor='$valorM',descripcion='$descriM' WHERE id = '$id'";
      //var_dump($sql); /*para que proves porq el error */
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
