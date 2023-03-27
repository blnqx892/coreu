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
              <span>Control de Adquición</span>
            </li>
            <li class="breadcrumb-item active">
              <span>Adquisiciones</span>
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
              <div class="card-header"><strong>Tabla de Adquisiciones</strong></div>
              <div class="card-body">
                <!-- dataTable-->
                <table id="example" class="display" style="width:100%" >
                  <thead>
                    <tr align="center">
                      <th>Nombre</th>
                      <th>N° Factura</th>
                      <th>Marca</th>
                      <th>Categoria</th>
                      <th>Fecha</th>
                      <th align="center">Acción</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr align="center">
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011-04-25</td>
                      <td><button type="button" class="btn btn-info rounded-pill">Ver <i
                                  class='far fa-eye'></i></button>
                              <button type="button" class="btn btn-warning rounded-pill">Eliminar <i
                                  class='far fa-trash-alt'></i></button></td>
                    </tr>
                    <tr align="center">
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011-07-25</td>
                      <td><button type="button" class="btn btn-info rounded-pill">Ver <i
                                  class='far fa-eye'></i></button>
                              <button type="button" class="btn btn-warning rounded-pill">Eliminar <i
                                  class='far fa-trash-alt'></i></button></td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr align="center">
                      <th>Nombre</th>
                      <th>N° Factura</th>
                      <th>Marca</th>
                      <th>Categoria</th>
                      <th>Fecha</th>
                      <th>Acción</th>
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
    <!-- IMPORTAR ARCHIVO SCRIPT-->
    <?php include("foot/script.php"); ?>
    <!-- ////////////////////////-->
  </div>
</body>

</html>
