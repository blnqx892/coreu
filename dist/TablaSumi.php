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
              <span>Suministros</span>
            </li>
            <li class="breadcrumb-item">
              <span>Catálogo de Suministros</span>
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
              <div class="card-header"><strong>Suminstros</strong></div>
              <div class="card-body">
                <!-- dataTable-->
                <table id="example" class="display" style="width:100%" cellpadding="0" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="text-align:center;">Codigo</th>
                      <th style="text-align:center;">Trajeta N°</th>
                      <th style="text-align:center;">Nombre de Suministro</th>
                      <th style="text-align:center;">Precio</th>
                      <th style="text-align:center;">Ubicación</th>
                      <th style="text-align:center;">Acción</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center;">
                    <tr>
                      <td>FA00789</td>
                      <td>23</td>
                      <td>Lapiz Facela</td>
                      <td>$ 4.75</td>
                      <td>Estante A3</td>
                      <td><button type="button" class="btn btn-info rounded-pill" title="Ver"><i
                            class='far fa-eye'></i></button>
                            <button type="button" class="btn btn-warning rounded-pill" title="Editar"><i class="far fa-edit"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>B0N00123</td>
                      <td>12</td>
                      <td>Resma papel bond</td>
                      <td>$ 6.25</td>
                      <td>Estante A2</td>
                      <td><button type="button" class="btn btn-info rounded-pill" title="Ver"><i
                            class='far fa-eye'></i></button>
                            <button type="button" class="btn btn-warning rounded-pill" title="Editar"><i class="far fa-edit"></i></button>
                            <button type="button" class="btn btn-success rounded-pill" title="Alta"><i class="fa-regular fa-arrow-up"></i></button>
                            <button type="button" class="btn btn-danger rounded-pill" title="Baja"><i class="fa-regular fa-arrow-down"></i></button>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                    <th style="text-align:center;">Codigo</th>
                      <th style="text-align:center;">Trajeta N°</th>
                      <th style="text-align:center;">Nombre de Suministro</th>
                      <th style="text-align:center;">Precio $</th>
                      <th style="text-align:center;">Ubicación</th>
                      <th style="text-align:center;">Acción</th>
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
</body>

</html>
