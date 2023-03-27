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
              <span>Actualización</span>
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
              <div class="card-header"><strong>Actualizacion Usuarios</strong></div>
              <div class="card-body">
                <!-- dataTable-->
                <table id="example" class="display" style="width:100%" cellpadding="0" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="text-align:center;">Nombre</th>
                      <th style="text-align:center;">Apellido</th>
                      <th style="text-align:center;">Usuario</th>
                      <th style="text-align:center;">Acción></th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center;">
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>Perz</td>
                      <td>Edinburgh</td>
                      <td><button type="button" class="btn btn-info rounded-pill" title="Ver"><i
                            class='far fa-eye'></i></button>
                        <button type="button" class="btn btn-warning rounded-pill" title="Codificar"><i
                            class="	fas fa-barcode"></i></button></td>
                      
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>Calderón</td>
                      <td>Accountant</td>
                      <td><button type="button" class="btn btn-info rounded-pill" title="Ver"><i
                            class='far fa-eye'></i></button>
                        <button type="button" class="btn btn-warning rounded-pill" title="Codificar"><i
                            class="	fas fa-barcode"></i></button></td>
                      
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                    <th style="text-align:center;">Nombre</th>
                      <th style="text-align:center;">Apellido</th>
                      <th style="text-align:center;">Usuario</th>
                      <th style="text-align:center;">Acción></th>
                    </tr>
                  </tfoot>
                </table>
                <!-- //dataTable-->
              </div>
            </div>
          </div>
          <!-- /.row-->
        </div>
        <!-- ///////FIN CONTENEDOR/////////////-->
      </div>
    </div>
      <!-- IMPORTAR ARCHIVO FOOTER-->
      <?php include("foot/foot.php"); ?>
      <!-- ////////////////////////-->
      <!-- IMPORTAR ARCHIVO SCRIPT-->
      <?php include("foot/script.php"); ?>
      <!-- ////////////////////////-->
    </div>
</body>

</html>
