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
              <span>Mobiliario y Otros</span>
            </li>
            <li class="breadcrumb-item active">
              <span>Ingreso de Mobiliario</span>
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
              <div class="card-header"><strong>Ingreso de Mobiliarios</strong></div>
              <div class="card-body">
                <!--INICIO FORM-->
                <form id="formm" class="g-3 needs-validation" role="form" action="" method="POST" autocomplete="off">
                  <input type="hidden" value="Guardar" name="bandera">
                  <!--INICIO SECCION FECHA-->
                  <div class="row">
                    <div class="col-md-3">
                      <label for="inputEmail4" class="form-label">Fecha:</label>
                      <input type="date" class="form-control" id="fecham">
                    </div>
                  </div>
                  <!--FIN SECCION FECHA-->
                  <!--SECCION DOS-->
                  <div class="row  my-4">
                    <div class="col-md-4">
                      <label for="inputAddress2" class="form-label">Nombre Mobiliario:</label>
                      <input type="text" class="form-control" id="nomm" placeholder="">
                    </div>
                    <div class="col-md-4">
                      <label for="inputZip" class="form-label">Modelo:</label>
                      <input type="text" class="form-control" id="modelom">
                    </div>
                    <div class="col-md-4">
                      <label for="inputZip" class="form-label">Valor de Adquisición:</label>
                      <input type="text" class="form-control" id="valorm">
                    </div>
                  </div>
                  <!--FIN SECCION DOS-->
                  <div class="row  my-4">
                    <div class="col-md-6">
                      <label for="inputZip" class="form-label">Descripción:</label>
                      <textarea class="form-control" id="descrim" required="" row="3">
                      </textarea>
                    </div>
                  </div>
                  <!--FIN SECCION CUATRO-->
                  <div class="col-15" align="right">
                    <hr style="color: black; background-color: black; width:100%;" />
                    <button class="btn btn-success" type="submit" id="GuardaMobiliario" name="btnGuardar">Guardar <i
                        class='far fa-check-square'></i>
                    </button>
                    <button class="btn btn-secondary" type="reset">Cancelar <i class='far fa-times-circle'></i>
                    </button>
                  </div>
                </form>
                <!--/// FIN FORM ////////////////-->
              </div>
            </div>
          </div>
          <!-- /.row-->
        </div>
      </div>
      <!-- ///////FIN CONTENEDOR/////////////-->
    </div>
    <script src="./Controlador/Mobiliarioyotros/mobiliario.js"></script>
    <!-- IMPORTAR ARCHIVO FOOTER-->
    <?php include("foot/foot.php"); ?>
    <!-- ////////////////////////-->
    <!-- IMPORTAR ARCHIVO SCRIPT-->
    <?php include("foot/script.php"); ?>
    <!-- ////////////////////////-->
  </div>
</body>

</html>
