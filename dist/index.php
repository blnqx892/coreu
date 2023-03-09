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
      <!--separador-->
      <div class="container-fluid">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
              <!-- if breadcrumb is single--><span>INICIO</span>
            </li>
          </ol>
        </nav>
      </div>
    </header>
    <!-- CONTENEDOR-->
    <div class="body flex-grow-1 px-4">
      <div class="container-lg">
        <!-- WIGET-->
        <div class="tab-content rounded-bottom">
          <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1179">
            <div class="row">
              <div class="col-6 col-lg-3">
                <div class="card overflow-hidden">
                  <div class="card-body p-0 d-flex align-items-center">
                    <div class="bg-primary text-white p-4 me-3">
                      <svg class="icon icon-xl">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                      </svg>
                    </div>
                    <div>
                      <div class="fs-6 fw-semibold text-primary">$1.999,50</div>
                      <div class="text-medium-emphasis text-uppercase fw-semibold small">Requisiciones Al</div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-6 col-lg-3">
                <div class="card overflow-hidden">
                  <div class="card-body p-0 d-flex align-items-center">
                    <div class="bg-info text-white p-4 me-3">
                      <svg class="icon icon-xl">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-laptop"></use>
                      </svg>
                    </div>
                    <div>
                      <div class="fs-6 fw-semibold text-info">$1.999,50</div>
                      <div class="text-medium-emphasis text-uppercase fw-semibold small">Requisiciones Ua</div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-6 col-lg-3">
                <div class="card overflow-hidden">
                  <div class="card-body p-0 d-flex align-items-center">
                    <div class="bg-warning text-white p-4 me-3">
                      <svg class="icon icon-xl">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-moon"></use>
                      </svg>
                    </div>
                    <div>
                      <div class="fs-6 fw-semibold text-warning">$1.999,50</div>
                      <div class="text-medium-emphasis text-uppercase fw-semibold small">Stock </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-6 col-lg-3">
                <div class="card overflow-hidden">
                  <div class="card-body p-0 d-flex align-items-center">
                    <div class="bg-danger text-white p-4 me-3">
                      <svg class="icon icon-xl">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                      </svg>
                    </div>
                    <div>
                      <div class="fs-6 fw-semibold text-danger">$1.999,50</div>
                      <div class="text-medium-emphasis text-uppercase fw-semibold small">Widget title</div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
          </div>
        </div>
        <!-- /WIGET-->
        <!-- row-->
        <div class="row">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row  my-4">
                <!--INICIO SECCION DOS-->
                <div class="">
                  <center><img src="img/cuboo2.png" alt="SICAFI" width="250" height="250" />
                    <h1 style="font-family:copperplate,monospace,cursiva; font-size:20px;text-decoration:none">
                      <b>S I C A F I</b></h1>
                  </center>
                </div>
              </div>

              <!--CODIGO DE FECHA Y HORA-->

              <!-- ////////////////////////-->
            </div>
          </div>
        </div>
        <!-- /.row-->
      </div>
    </div>
    <!-- ////////////////////////-->
    <!-- IMPORTAR ARCHIVO FOOTER-->
    <?php include("foot/foot.php"); ?>
    <!-- ////////////////////////-->
  </div>
  <!-- IMPORTAR ARCHIVO SCRIPT-->
  <?php include("foot/script.php"); ?>
  <!-- ////////////////////////-->
</body>

</html>
