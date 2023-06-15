<!DOCTYPE html>
<html lang="en">
<!-- IMPORTAR ARCHIVO CABECERA-->
<?php include("head/head.php"); ?>
<!-- ////////////////////////-->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
            <li class="breadcrumb-item">
              <a href="index.php"><svg class="icon me-2">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-home">
                  </use>
                </svg></a>
            </li>
            <li class="breadcrumb-item">
              <span>Control Mantenimiento</span>
            </li>
            <li class="breadcrumb-item active">
              <span>Movimientos</span>
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
              <div class="card-header"><strong>Movimiento de Bienes Muebles</strong></div>
              <div class="card-body">
                <!--INICIO FORM-->
                <form class="g-3 needs-validation" novalidate="">
                  <div class="row my-4">
                    <div class="col-md-3">
                      <label class="form-label" for="validationCustom02">Buscar por Codigo:</label>
                      <select class="form-control js-example-basic-single">
                        <option value=""></option>
                      </select>
                      <script>
                        jQuery(document).ready(function ($) {
                          $(".js-example-basic-single").select2();
                        });
                      </script>
                    </div>
                    <div class="col-md-1">
                      <label for="inputCity" class="form-label">Buscar</label>
                      <button class="btn btn-primary" type="submit">Ir</button>
                    </div>
                  </div>
                  <hr style="color: black; background-color: black; width:100%;" />
                  <div class="row my-4">
                    <div class="col-md-2">
                      <label class="form-label" for="validationCustom01">Fecha:</label>
                      <input class="form-control" id="validationCustom01" type="date" required="">
                    </div>
                    <div class="col-md-3">
                      <label class="form-label" for="validationCustom02">Procedencia:</label>
                      <input class="form-control" id="validationCustom02" type="text" required="">
                    </div>
                    <div class="col-md-3">
                      <label class="form-label" for="validationCustom02">Destino:</label>
                      <input class="form-control" id="validationCustom02" type="text" required="">
                    </div>
                  </div>
                  <div class="row my-4">
                    <div class="col-md-3">
                      <label class="form-label" for="validationCustom02">Tipo de Movimiento:</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                          Prestamo
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                          Traslado Definitivo
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                          Reparación
                        </label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="validationCustom02">Observaciones:</label>
                      <textarea class="form-control" id="validationCustom02" required="" rows="4"></textarea>
                    </div>
                  </div>
                  <!--FIN-->
                  <h4>Caracteristicas</h4>
                  <hr style="color: black; background-color: black; width:100%;" />
                  <div class="row my-4">
                    <div class="col-md-3">
                      <label class="form-label" for="validationCustom02">Nombre:</label>
                      <input class="form-control" id="validationCustom02" type="text" required="">
                    </div>
                    <div class="col-md-3">
                      <label class="form-label" for="validationCustom02">Descripcion:</label>
                      <input class="form-control" id="validationCustom02" type="text" required="">
                    </div>
                    <div class="col-md-3">
                      <label class="form-label" for="validationCustom02">Modelo:</label>
                      <input class="form-control" id="validationCustom02" type="text" required="">
                    </div>
                    <div class="col-md-3">
                      <label class="form-label" for="validationCustom02">Serie:</label>
                      <input class="form-control" id="validationCustom02" type="text" required="">
                    </div>
                    <div class="col-md-3">
                      <label class="form-label" for="validationCustom02">Marca:</label>
                      <input class="form-control" id="validationCustom02" type="text" required="">
                    </div>
                    <div class="col-md-3">
                      <label class="form-label" for="validationCustom02">Codigo:</label>
                      <input class="form-control" id="validationCustom02" type="text" required="">
                    </div>
                  </div>
                  <!--FIN-->
                  <div class="col-15" align="right">
                    <hr style="color: black; background-color: black; width:100%;" />
                    <button class="btn btn-success" type="submit">Guardar <i class='far fa-check-square'></i></button>
                    <button class="btn btn-secondary" type="submit">Cancelar <i
                        class='far fa-times-circle'></i></button>
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
    <!-- IMPORTAR ARCHIVO FOOTER-->
    <?php include("foot/foot.php"); ?>
    <!-- IMPORTAR ARCHIVO SCRIPT-->
    <?php include("foot/script.php"); ?>
    <!-- ////////////////////////-->
  </div>
</body>

</html>