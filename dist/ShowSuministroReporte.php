<?php // Iniciamos la sesión
session_start();
if (isset($_SESSION['usuarioActivo'])) {
?>
<!DOCTYPE html>
<html lang="en">
<!-- IMPORTAR ARCHIVO CABECERA-->
<?php include("head/head.php"); ?>
<!-- ////////////////////////-->
<script src="js/JsBarcode.all.min.js"></script>
<link rel="stylesheet" href="Controlador/Suministros/imprimir.css">

<?php
    $id = $_GET["id"] or die('La url debe llevar un id como parámetro');
    $conexion=mysqli_connect('localhost','root', '', 'sicafi');
    $sql="SELECT * from ingreso_suministros where id=".$id;
    $nombre = mysqli_query($conexion, $sql) or die("No se puedo ejecutar la consulta");
?>

<body>
    <!-- IMPORTAR ARCHIVO MENU VERTICAL-->
    <?php include("menu/verti.php"); ?>
    <!-- ////////////////////////-->
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <!-- IMPORTAR ARCHIVO MENU HORIZONTAL-->
            <?php include("menu/hori.php");?>
            <!-- ////////////////////////-->
            <div class="header-divider"></div>
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-0 ms-2">
                        <li class="breadcrumb-item">
                            <a href="index.php"><svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-home">
                                    </use>
                                </svg></a>
                        </li>
                        <li class="breadcrumb-item">
                            <span>Suministros</span>
                        </li>
                        <li class="breadcrumb-item">
                            <span>Ver suministro</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </header>
        <!-- CONTENEDOR-->
        <div class="body flex-grow-1 px-3" id="contenidoImprimir">
            <div class="container-lg">
                <!-- row-->
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <div class="my-auto">
                                        <strong>Kardex</strong>
                                    </div>
                                </div>
                            </div>


                            <div class="card-body">
                                <div class="row">
                                    <h3>Información de Kardex</h3>
                                </div>
                                <?php While($mostrar=mysqli_fetch_assoc($nombre)){?>

                                <div class="row mt-3" style="padding: 0rem 2rem;">
                                    <div class="membrete" id="">
                                        <div>ALCALDÍA MUNICIPAL DE SAN VICENTE</div>
                                        <div>CONTROL DE EXISTENCIA
                                            DE SUMINISTROS</div>
                                    </div>

                                    <div class="codigo-tarjeta">

                                        <div>Codigo:
                                            <span class="fw-bold">
                                                <?php echo $mostrar['codigo_barra'] ?>
                                            </span>
                                        </div>
                                        <div>Tarjeta numero:
                                            <span class="fw-bold">
                                                <?php echo $mostrar['numero_tarjeta'] ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="codigo-tarjeta">

                                        <div>Nombre del Articulo:
                                            <span class="fw-bold">
                                                <?php echo $mostrar['nombre_suministro'] ?>
                                            </span>
                                        </div>
                                        <div>Almacen:
                                            <span class="fw-bold">
                                                <?php
                                                // Obtener el valor de $mostrar['almacen']
                                                $almacen = $mostrar['almacen'];

                                                // Validar si $almacen es nulo o vacío
                                                if (empty($almacen)) {
                                                    echo 'El almacen no ha sido asignado';
                                                } else {
                                                    // Si $almacen no es nulo ni vacío, mostrar su valor
                                                    echo '<span class="fw-bold">' . $almacen . '</span>';
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    </div>


                                    <div class="row mt-3">
                                    </div>
                                    <?php } ?>
                                    <div class="css-buttons">
                                        <div>
                                            <button class="btn btn-success" id="btnImprimir"
                                                onclick="printDiv('contenidoImprimir')">Imprimir Contenido</button>
                                        </div>
                                        <div>
                                            <a class="btn btn-secondary" href="TablaSumi.php" title="Atrás"><i
                                                    class="fa fa-arrow-left" aria-hidden="true"></i></a>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                        <!-- /.row-->
                    </div>
                </div>
                <!-- ///////FIN CONTENEDOR/////////////-->
            </div>


            <!-- IMPORTAR ARCHIVO FOOTER-->
            <?php include("foot/foot.php"); ?>
            <!-- ////////////////////////-->
            <!-- IMPORTAR ARCHIVO SCRIPT-->
            <?php include("foot/script.php"); ?>
            <!-- ////////////////////////-->
            <script src="js/utils.js"></script>
            <script src="Controlador/Suministros/imprimir.js"></script>


</body>

</html>



<?php
}else{
    ?>
<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="refresh" content="0;URL=/coreu/dist/Acceso.php">
</head>

<body>
</body>

</html>
<?php
}
?>
