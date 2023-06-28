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
                      <label for="inputZip" class="form-label">Codigo (ID):</label>
                      <input type="text" class="form-control" id="" name="codigo">
                    </div>
                    <div class="col-md-3">
                      <label for="inputZip" class="form-label">Codigo de Barra:</label>
                      <input type="text" class="form-control" id="" name="codigob">
                    </div>
                    <div class="col-md-3">
                      <label for="inputZip" class="form-label">Nombre del Artículo:</label>
                      <input type="text" class="form-control" id="" name="tarjeta">
                    </div>
                    <div class="col-md-3">
                      <label for="inputZip" class="form-label">Presentación:</label>
                      <input type="text" class="form-control" id="" name="ubicacion">
                    </div>
                  </div>
                  <!--FIN SECCION DOS-->
                  <div class="row  my-4">
                    <!--INICIO SECCION TRES-->
                    <div class="col-md-3">
                      <label for="inputZip" class="form-label">Unidad de Medida:</label>
                      <input type="text" class="form-control" id="" name="nombre" placeholder="">
                    </div>
                    <div class="col-md-3">
                      <label for="inputZip" class="form-label">Existencia Mínima:</label>
                      <input type="text" class="form-control" id="" name="marca">
                    </div>
                    <div class="col-md-3">
                      <label for="inputZip" class="form-label">Existencia Máxima:</label>
                      <input type="text" class="form-control" id="" name="unidad">
                    </div>
                    <div class="col-md-3">
                      <label for="inputZip" class="form-label">Almacén:</label>
                      <input type="text" class="form-control" id="" name="ubicacion">
                    </div>
                  </div>
                  <!--FIN SECCION TRES-->
                  <div class="row  my-4">
                    <!--INICIO SECCION CUATRO-->
                    <div class="col-md-3">
                      <label for="inputZip" class="form-label">Estante:</label>
                      <input type="text" class="form-control" id="" name="ubicacion">
                    </div>
                    <div class="col-md-3">
                      <label for="inputZip" class="form-label">Entrepaño:</label>
                      <input type="text" class="form-control" id="" name="ubicacion">
                    </div>
                    <div class="col-md-3">
                      <label for="inputZip" class="form-label">Casilla:</label>
                      <input type="text" class="form-control" id="" name="ubicacion">
                    </div>
                    <div class="col-md-3">
                      <label for="inputZip" class="form-label"></label><br><br>
                      <button class="btn btn-success" type="submit">Guardar <i class='far fa-check-square'></i></button>
                    </div>
                  </div>
                  <div class="row  my-4">
                    <div class="col-md-3">
                      <label for="inputZip" class="form-label"></label>
                      <button class="btn btn-success" type="button" data-coreui-toggle="modal"
                        data-coreui-target="#modalAgg">Agregar <i class='far fa-check-square'></i></button>
                    </div>
                  </div>
                  <div class="row  my-4">
                    <div>
                      <table class="table" style="text-align:center;">
                        <thead class="table-dark">
                          <tr>
                            <th>Fecha</th>
                            <th>Concepto</th>
                            <th>Fondo Procedencia</th>
                            <th>Tipo de Movimiento</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Saldo</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th>1</th>
                            <th>0003</th>
                            <th>CM</th>
                            <th>Lapiz facela</th>
                            <th>3</th>
                            <th>3</th>
                            <th>3</th>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!--FIN SECCION CUATRO-->
                  <div class="col-15" align="right">
                    <hr style="color: black; background-color: black; width:100%;" />
                    <button class="btn btn-secondary" type="reset">Cancelar <i class='far fa-times-circle'></i></button>
                  </div>
                </form>
                <!--/// FIN FORM ////////////////-->
              </div>
            </div>
          </div>
          <!-- /.row-->
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modalAgg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <form class="g-3 needs-validation" action="" method="POST" autocomplete="off">
              <input type="hidden" value="Guardar1" name="bandera">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Agregar Insumos</h5>
                  <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row my-4">
                    <div class="col-md-4">
                      <?php
                       $fecha_actual = date("Y-m-d"); // fecha actual, value con min el cual evita seleccionar fechas anteriores
                      ?>
                      <label for="inputEmail4" class="form-label">Fecha:</label>
                      <input type="date" class="form-control" value="<?php echo $fecha_actual; ?>"
                        min="<?php echo $fecha_actual; ?>" id="fechaC" name="fechaC">
                    </div>
                  </div>
                  <div class="row my-4">
                    <div class="col-md-6">
                      <label for="inputCity" class="form-label">Concepto:</label>
                      <input type="text" class="form-control" id="nombreProv" name="nombreProv">
                    </div>
                    <div class="col-md-5">
                      <label class="form-label" for="validationCustom04">Fondo Procedencia: </label>
                      <select class="form-select" required="" id="cargoC" name="cargoC">
                        <option selected="" disabled="" value="">Elegir Fondo</option>
                        <option value=""></option>
                      </select>
                      <div class="invalid-feedback">Please select a valid state.</div>
                    </div>
                  </div>
                  <div class="row my-4">
                  <div class="col-md-5">
                      <label class="form-label" for="validationCustom04">Tipo de movimiento:</label>
                      <select class="form-select" required="" id="cargoC" name="cargoC">
                        <option selected="" disabled="" value="">Elegir Movimiento</option>
                        <option value=""></option>
                      </select>
                      <div class="invalid-feedback">Please select a valid state.</div>
                    </div>
                    <div class="col-md-3">
                      <label for="inputCity" class="form-label">Cantidad:</label>
                      <input type="text" class="form-control" id="nombreProv" name="nombreProv">
                    </div>
                    <div class="col-md-3">
                      <label for="inputCity" class="form-label">Precio:</label>
                      <input type="text" class="form-control" id="nombreProv" name="nombreProv">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" id="GuardaProveedor" class="btn btn-primary">Guardar</button>
                  <button type="reset" class="btn btn-secondary" data-coreui-dismiss="modal">Cancelar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!--////////////////////////////////////////-->
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