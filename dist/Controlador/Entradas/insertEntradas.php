<?php
include("../../Confi/conexion.php");
$conexion = con();

    $fecha = $_POST["fecha"];
    $factura = $_POST["factura"];
    $costo = $_POST["costo"];
    $prov = $_POST["prove"];
    $nombre = $_POST["nombre"];
    $serie = $_POST["serie"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $color = $_POST["color"];
    $cargo = $_POST["cargo"];
    $vida= $_POST["vida"];
    $cate = $_POST["cate"];
    $descrip = $_POST["descri"];
    $numerom = $_POST["numeromo"];
    $numerocha = $_POST["numerochasis"];
    $numerop = $_POST["numeropla"];
    $capaci = $_POST["capa"];
    $x       =$_POST["bandera"];
   
   $sql = "INSERT INTO ingreso_entradas (fecha_adquisicion,numero_factura,costo_adquisicion,nombre_adquisicion,
    serie_adquisicion,marca,modelo,color,descripcion_adquisicion,cargo,vida_util,fk_categoria,fk_proveedores,numero_motor,numero_chasis,numero_placa,capacidad,boolean_transporte) VALUES 
    ('$fecha','$factura', '$costo','$nombre','$serie','$marca','$modelo','$color','$descrip','$cargo',
    '$vida','$cate','$prov','$numerom','$numerocha','$numerop','$capaci','$x')";
  
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