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
              <span>Control de Respaldo</span>
            </li>
            <li class="breadcrumb-item active">
              <span>Respaldo</span>
            </li>
          </ol>
        </nav>
      </div>
    </header>
    <!-- CONTENEDOR-->
    <div class="body flex-grow-1 px-3">
      <div class="container-lg">
        <!-- row-->
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header"><strong>Importar/Exportar</strong></div>
              <div class="card-body">
                <!-- dataTable-->
                <table id="" class="display" style="width:100%" cellpadding="0" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="text-align:center;">Importar</th>
                      <th style="text-align:center;">Exportar</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center;">
                    <tr>
                      <td><a href="" class="btn btn-info rounded-pill" data-coreui-toggle="modal"
                          data-coreui-target="#modalRes" title="Importar"><i class='fas fa-upload'></i></a></td>
                      <td><a href="Controlador/Backup/backup.php" class="btn btn-info rounded-pill" title="Exportar"><i
                            class='fas fa-download'></i></a></td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th style="text-align:center;">Importar</th>
                      <th style="text-align:center;">Exportar</th>
                    </tr>
                  </tfoot>
                </table>
                <!-- //dataTable-->
              </div>
            </div>
          </div>
          <!-- /.row-->
        </div>


        <!-- RESPALDO -->
        <div class="modal fade" id="modalRes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Restaurar Copia de Seguridad</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="Controlador/Backup/restore.php" method="post" enctype="multipart/form-data">
                  <input type="file" name="archivo" id="archivo" required>
                  <input type="submit" value="Restaurar"><br><br>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Cerrar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!--///////////////TERMINA MODAL /////////////////////-->
      </div>
      <!-- ///////FIN CONTENEDOR/////////////-->

    </div>
    <!-- FIN BODY>
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
