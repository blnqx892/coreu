<!DOCTYPE html>
<html lang="en">
<!-- IMPORTAR ARCHIVO CABECERA-->
<?php include("head/head.php"); ?>
<!-- ////////////////////////-->

<body>
  <!-- IMPORTAR ARCHIVO MENU VERTICAL-->
  <?php include("menu/sidebar.php"); ?>
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
              <!-- if breadcrumb is single--><span>Requisición</span>
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
              <div class="card-header"><strong>Formulario de Requisición de Suministros</strong></div>
              <div class="card-body">
                <!--INICIO FORM-->
                <form class="g-3 needs-validation" novalidate="">
                  <!--INICIO SECCION FECHA-->
                  <div class="row">
                    <div class="col-md-2">
                      <label for="inputEmail4" class="form-label">Fecha:</label>
                      <input type="date" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-3">
                      <label for="inputAddress2" class="form-label">Unidad Solicitada:</label>
                      <input type="text" class="form-control" id="inputAddress2" placeholder="">
                    </div>
                  </div>
                  <!--FIN SECCION FECHA-->
                  <!--FIN SECCION DOS-->
                  <div class="row  my-4">
                    <!--INICIO SECCION TRES-->
                    <div class="col-md-1">
                      <label for="inputAddress2" class="form-label">No.:</label>
                      <input type="text" class="form-control" id="inputAddress2" placeholder="">
                    </div>
                    <div class="col-md-2">
                      <label for="inputZip" class="form-label">Codigo:</label>
                      <input type="text" class="form-control" id="inputZip">
                    </div>
                    <div class="col-md-2">
                      <label for="inputCity" class="form-label">Unidad de Medida:</label>
                      <input type="number" class="form-control" id="inputCity">
                    </div>
                    <div class="col-md-4">
                      <label for="inputZip" class="form-label">Descripción de Suministro:</label>
                      <input type="text" class="form-control" id="inputZip">
                    </div>
                    <div class="col-md-1">
                      <label for="inputCity" class="form-label">Cantidad:</label>
                      <input type="number" class="form-control" id="inputCity">
                    </div>
                    <div class="col-md-0">
                    <button class="btn btn-primary" type="submit">Agregar</button>
                    </div>
                  </div>
                  <!--FIN SECCION TRES-->
                  <!--FIN SECCION CUATRO-->
                  <div class="col-15" align="right">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-danger" type="submit">Cancelar</button>
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

      <!-- IMPORTAR ARCHIVO FOOTER-->
      <?php include("foot/foot.php"); ?>
      <!-- ////////////////////////-->
    </div>
    <!-- IMPORTAR ARCHIVO SCRIPT-->
    <?php include("foot/script.php"); ?>
    <!-- ////////////////////////-->
</body>

</html>