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
        <!-- row-->
        <div class="row">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row  my-4">
                <!--INICIO SECCION DOS-->
                <div class="col-md-8">
                  <center><img src="img/cuboo2.png" alt="SICAFI" width="250" height="250" align="center" />
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
