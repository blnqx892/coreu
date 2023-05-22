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
              <span>Control Adquisición</span>
            </li>
            <li class="breadcrumb-item active">
              <span>Asignación de Activo</span>
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
              <div class="card-header"><strong>Asignación de Activo</strong></div>
              <div class="card-body">
                <!--INICIO FORM-->
                <form class="g-3 needs-validation" novalidate="">
                  <div class="row">
                    <!--INICIO-->
                    <div class="col-md-4">
                      <label class="form-label" for="validationCustom01">Fecha Asignación:</label>
                      <input class="form-control" id="validationCustom01" type="date" required="">
                    </div>
                  </div>
                  <!--FIN-->
                  <div class="row  my-4">
                    <div class="col-md-4">
                      <label class="form-label" for="validationCustom02">Ubicación:</label>
                      <input class="form-control" id="validationCustom02" type="text" required="">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label" for="validationCustom02">Jefe Responsable:</label>
                      <input class="form-control" id="validationCustom02" type="text" required="">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label" for="validationCustom04">Modelo</label>
                      <select class="form-select" id="validationCustom04" required="">
                        <option selected="" disabled="" value="">Choose...</option>
                      </select>
                      <div class="invalid-feedback">Please select a valid state.</div>
                    </div>
                  </div>
                  <hr style="color: black; background-color: black; width:100%;" /> 
                  <!--FIN-->
                  <div class="row  my-4">
                    <div class="col-md-4">
                      <label class="form-label" for="validationCustom02">Nombre:</label>
                      <input class="form-control" id="validationCustom02" type="text" required="" disabled>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label" for="validationCustom02">Marca:</label>
                      <input class="form-control" id="validationCustom02" type="text" required="" disabled>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label" for="validationCustom02">Color:</label>
                      <input class="form-control" id="validationCustom02" type="text" required="" disabled>
                    </div>
                    <div class="row  my-4">
                    <div class="col-md-4">
                      <label class="form-label" for="validationCustom02">Serie:</label>
                      <input class="form-control" id="validationCustom02" type="text" required="" disabled>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label" for="validationCustom04">Categoria: </label>
                      <select class="form-select" id="validationCustom04" required="" disabled>
                        <option selected="" disabled="" value="">Choose...</option>
                      </select>
                      <div class="invalid-feedback">Please select a valid state.</div>
                    </div>
                    </div>
                  </div>
                  <hr style="color: black; background-color: black; width:100%;" />
                  <!--FIN-->
                  <div class="row  my-4">
                    <div class="col-md-4">
                      <label class="form-label" for="validationCustom02">Codigo:</label>
                      <input class="form-control" id="validationCustom02" type="text" required="">
                    </div><br>
                    <div class="col-md-4">
                      <label class="form-label" for="validationCustom02">Encargado del Bien:</label>
                      <input class="form-control" id="validationCustom02" type="text" required="">
                    </div>
                  </div>
                  <hr style="color: black; background-color: black; width:100%;" />
                  <!--FIN-->
                  <div class="col-12" align="right">
                  <button class="btn btn-success" type="submit">Guardar <i class='far fa-check-square'></i></button>
                      <button class="btn btn-secondary" type="submit">Cancelar <i class='far fa-times-circle'></i></button>
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
</body>

</html>