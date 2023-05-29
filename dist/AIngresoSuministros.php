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
            <li class="breadcrumb-item active">
              <span>Ingreso de Suministros</span>
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
              <div class="card-header"><strong>Ingreso de Suministros</strong></div>
              <div class="card-body">
                <!--INICIO FORM-->
                <form class="g-3 needs-validation" action="Controlador/IngresoSuministrosC.php" method="POST"
                  autocomplete="off">
                  <input type="hidden" value="Guardar" name="bandera">
                  <!--INICIO SECCION FECHA-->
                  <div class="row">
                    <div class="col-md-3">
                      <?php
                       $fecha_actual = date("Y-m-d"); // fecha actual, value con min el cual evita seleccionar fechas anteriores
                      ?>
                      <label for="inputEmail4" class="form-label">Fecha:</label>
                      <input type="date" class="form-control" value="<?php echo $fecha_actual; ?>"
                        min="<?php echo $fecha_actual; ?>" id="" name="fecha">
                    </div>
                  </div>
                  <!--FIN SECCION FECHA-->
                  <div class="row  my-4">
                    <!--INICIO SECCION DOS-->
                    <div class="col-md-3">
                      <label for="inputEmail4" class="form-label">Codigo:</label>
                      <input type="text" class="form-control" id="" name="codigo">
                    </div>
                    <div class="col-md-3">
                      <label for="inputEmail4" class="form-label">Codigo de Barra:</label>
                      <input type="text" class="form-control" id="" name="codigob">
                    </div>
                    <div class="col-md-2">
                      <label for="inputPassword4" class="form-label">Tarjeta No.:</label>
                      <input type="number" class="form-control" id="" name="tarjeta">
                    </div>
                    <div class="col-md-2">
                      <label for="inputPassword4" class="form-label">Stock:</label>
                      <input type="number" class="form-control" id="" name="stock">
                    </div>
                  </div>
                  <!--FIN SECCION DOS-->
                  <div class="row  my-4">
                    <!--INICIO SECCION TRES-->
                    <div class="col-md-4">
                      <label for="inputAddress2" class="form-label">Nombre de Suministro:</label>
                      <input type="text" class="form-control" id="" name="nombre" placeholder="">
                    </div>
                    <div class="col-md-4">
                      <label for="inputZip" class="form-label">Marca:</label>
                      <input type="text" class="form-control" id="" name="marca">
                    </div>
                    <div class="col-md-2">
                      <label for="inputCity" class="form-label">Cantidad:</label>
                      <input type="number" class="form-control" id="" name="cantidad">
                    </div>
                    <div class="col-md-2">
                      <label for="inputZip" class="form-label">Precio:</label>
                      <input type="text" class="form-control" id="" name="precio">
                    </div>
                  </div>
                  <!--FIN SECCION TRES-->
                  <div class="row  my-4">
                    <!--INICIO SECCION CUATRO-->
                    <div class="col-md-3">
                      <label for="inputZip" class="form-label">Unidad de Medida:</label>
                      <input type="text" class="form-control" id="" name="unidad">
                    </div>
                    <div class="col-md-3">
                      <label for="inputZip" class="form-label">Ubicación:</label>
                      <input type="text" class="form-control" id="" name="ubicacion">
                    </div>
                    <div class="col-md-6">
                      <label for="inputZip" class="form-label">Descripción:</label>
                      <textarea class="form-control" id="" required="" row="3" name="descrip">
                      </textarea>
                    </div>
                  </div>
                  <!--FIN SECCION CUATRO-->
                  <div class="col-15" align="right">
                    <hr style="color: black; background-color: black; width:100%;" />
                    <button class="btn btn-success" type="submit">Guardar <i class='far fa-check-square'></i></button>
                    <button class="btn btn-secondary" type="reset">Cancelar <i class='far fa-times-circle'></i></button>
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
