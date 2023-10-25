<?php // Iniciamos la sesión
session_start();
if (isset($_SESSION['usuarioActivo'])) {
?>
<!DOCTYPE html>
<html lang="en">
<!-- IMPORTAR ARCHIVO CABECERA-->
<?php include("head/head.php"); ?>
<!-- ////////////////////////-->

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
              <span>Control de Usuarios</span>
            </li>
            <li class="breadcrumb-item active">
              <span>Bitacora</span>
            </li>
          </ol>
        </nav>
      </div>
    </header>
    <?php
        $conexion=mysqli_connect('localhost','root', '', 'sicafi');
        $sql="SELECT * from bitacora order by id DESC";
        $bitacoras= mysqli_query($conexion, $sql) or die("No se puedo ejecutar la consulta"); ?>
    <!-- CONTENEDOR-->
    <div class="body flex-grow-1 px-3">
      <div class="container-lg">
        <!-- row-->
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header"><strong>Bitacora</strong></div>
              <div class="card-body">
                <!-- dataTable-->
                <table id="miTabla" class="display" style="width:100%" cellpadding="0" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="text-align:center;">Usuario</th>
                      <th style="text-align:center;">Fecha</th>
                      <th style="text-align:center;">Hora</th>
                      <th style="text-align:center;">Actividad</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center;">
                  <?php While ($bitacora = mysqli_fetch_assoc($bitacoras)) {
                         date_default_timezone_set('America/El_Salvador');
                  ?>
                    <tr>
                      <td><?php echo $bitacora['usuario'] ?></td>
                      <td><?php echo date('d/m/Y',strtotime($bitacora['fecha_creacion'])) ?></td>
                      <td><?php echo date('H:i:s A',strtotime($bitacora['fecha_creacion'])) ?></td>
                      <td><?php echo $bitacora['evento'] ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th style="text-align:center;">Usuario</th>
                      <th style="text-align:center;">Fecha</th>
                      <th style="text-align:center;">Hora</th>
                      <th style="text-align:center;">Actividad</th>
                    </tr>
                  </tfoot>
                </table>
                <!-- //dataTable-->
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
    <?php include("foot/script.php"); ?>
    <!-- ////////////////////////-->
  </div>
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
