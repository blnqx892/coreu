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
              <span>Ingreso de Entradas</span>
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
              <div class="card-header"><strong>Ingreso de Entradas</strong></div>
              <div class="card-body">
                <!--INICIO FORM-->
                <form class="g-3 needs-validation" action="Controlador/IngresoEntradasC.php" method="POST"
                  autocomplete="off">
                  <input type="hidden" value="Guardar" name="bandera">
                  <!--INICIO SECCION FECHA-->
                  <div class="row">
                    <div class="col-md-4">
                      <?php
                       $fecha_actual = date("Y-m-d"); // fecha actual, value con min el cual evita seleccionar fechas anteriores
                      ?>
                      <label for="inputEmail4" class="form-label">Fecha de Adquisición:</label>
                      <input type="date" class="form-control" value="<?php echo $fecha_actual; ?>"
                        min="<?php echo $fecha_actual; ?>" id="" name="fechaC">
                    </div>
                  </div>
                  <!--FIN SECCION FECHA-->
                  <div class="row  my-4">
                    <!--INICIO SECCION DOS-->
                    <div class="col-md-4">
                      <label for="inputEmail4" class="form-label">N° de Factura:</label>
                      <input type="text" class="form-control" id="" name="facturaC">
                    </div>
                    <div class="col-md-3">
                      <label for="inputAddress2" class="form-label">Costo de Adquición:</label>
                      <input type="number" class="form-control" placeholder="" id="" name="costoC">
                    </div>
                    <div class="col-md-3">
                      <!-- CARGANDO DESDE BD AL PROVEEDOR -->
                      <?php
                       $conexion=mysqli_connect('localhost','root', '', 'sicafi');
                       $sql="SELECT * from proveedores order by proveedor ASC";
                       $provee = mysqli_query($conexion, $sql) or die("No se puedo ejecutar la consulta"); 
                      ?>
                      <label class="form-label" for="validationCustom04">Proveedor: </label>
                      <select class="form-select" required id="" name="proveC">
                        <option selected="" disabled="" value="">Elegir Proveedor</option>
                        <?php
                            While($prove=mysqli_fetch_array($provee)){
                            echo '<option value="'.$prove['id'].'">'.$prove['proveedor'].'</option>';
                             }
                        ?>
                      </select>
                      <div class="invalid-feedback">Please select a valid state.</div>
                    </div>
                    <div class="col-md-1">
                      <label for="inputCity" class="form-label">Nuevo</label>
                      <button type="button" title="Nuevo Proveedor" class="btn btn-primary" data-coreui-toggle="modal"
                        data-coreui-target="#modalProv">
                        <i class='fas fa-plus'></i>
                      </button>
                    </div>
                  </div>
                  <!--FIN SECCION DOS-->
                  <div class="row  my-4">
                    <!--INICIO SECCION TRES-->
                    <div class="col-md-4">
                      <label for="inputCity" class="form-label">Nombre:</label>
                      <input type="text" class="form-control" id="" name="nombreC">
                    </div>
                    <div class="col-md-4">
                      <label for="inputZip" class="form-label">Serie:</label>
                      <input type="text" class="form-control" id="" name="serieC">
                    </div>
                    <div class="col-md-4">
                      <label for="inputZip" class="form-label">Marca:</label>
                      <input type="text" class="form-control" id="" name="marcaC">
                    </div>
                  </div>
                  <!--FIN SECCION TRES-->
                  <div class="row  my-4">
                    <!--INICIO SECCION CUATRO-->
                    <div class="col-md-4">
                      <label for="inputZip" class="form-label">Modelo:</label>
                      <input type="text" class="form-control" id="" name="modeloC">
                    </div>
                    <div class="col-md-3">
                      <label for="inputZip" class="form-label">Color:</label>
                      <input type="text" class="form-control" id="" name="colorC">
                    </div>
                    <div class="col-md-3">
                      <label class="form-label" for="validationCustom04">Tipo de Cargo: </label>
                      <select class="form-select" required="" id="" name="cargoC">
                        <option selected="" disabled="" value="">Choose...</option>
                        <option selected="" disabled="" value="">Nuevo</option>
                        <option selected="" disabled="" value="">Donado</option>
                      </select>
                      <div class="invalid-feedback">Please select a valid state.</div>
                    </div>
                    <div class="col-md-2">
                      <label for="inputZip" class="form-label">Vida Util:</label>
                      <input type="number" class="form-control" id="" name="vidaC">
                    </div>
                    <!--FIN SECCION CUATRO-->
                    <div class="row my-4">
                      <div class="col-md-4">
                      <?php
                       $conexion=mysqli_connect('localhost','root', '', 'sicafi');
                       $sql="SELECT * from categorias order by categoria ASC";
                       $categ = mysqli_query($conexion, $sql) or die("No se puedo ejecutar la consulta"); 
                      ?>
                        <label class="form-label" for="validationCustom04">Categoria</label>
                        <select class="form-select" required="" id="" name="cateC">
                          <option selected="" disabled="" value="">Elegir Categoria</option>
                          <?php
                            While($cat=mysqli_fetch_array($categ)){
                            echo '<option value="'.$cat['id'].'">'.$cat['categoria'].'</option>';
                             }
                        ?>
                        </select>
                        <div class="invalid-feedback">Please select a valid state.</div>
                      </div>
                      <div class="col-md-1">
                        <label for="inputCity" class="form-label">Nuevo</label>
                        <button type="button" class="btn btn-primary" data-coreui-toggle="modal"
                          data-coreui-target="#modalCate" title="Nueva Categoria">
                          <i class='fas fa-plus'></i>
                        </button>
                      </div>
                      <!--INICIO SECCION CINCO-->
                      <div class="col-md-7">
                        <label for="inputZip" class="form-label">Descripción:</label>
                        <textarea class="form-control" required="" row="6" id="" name="descriC">
                      </textarea>
                      </div>
                    </div>
                    <div class="row  my-2">
                      <div class="col-md-1">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Transporte</label>
                        <div class="form-check form-switch">
                          <input class="form-check-input" value="1" type="checkbox" role="switch"
                            id="flexSwitchCheckChecked" checked name="activarFormulario" onclick="mostrarFormulario()">
                        </div>
                      </div>
                    </div>
                    <div id="formulario" style="display:block;">
                      <hr style="color: black; background-color: black; width:100%;" />
                      <div class="row my-1">
                        <div class="col-md-2">
                          <label for="inputZip" class="form-label">No. Motor:</label>
                          <input type="text" class="form-control" id="" name="motorC">
                        </div>
                        <div class="col-md-2">
                          <label for="inputZip" class="form-label">No. Placa:</label>
                          <input type="text" class="form-control" id="" name="placaC">
                        </div>
                        <div class="col-md-2">
                          <label for="inputZip" class="form-label">No. Chasis:</label>
                          <input type="text" class="form-control" id="" name="chasisC">
                        </div>
                        <div class="col-md-2">
                          <label for="inputZip" class="form-label">Capacidad:</label>
                          <input type="text" class="form-control" id="" name="capacidadC">
                        </div>
                      </div>
                    </div>
                    <!--FIN SECCION CUATRO-->
                    <div class="col-15" align="right">
                      <hr style="color: black; background-color: black; width:100%;" />
                      <button class="btn btn-success" type="submit">Guardar <i class='far fa-check-square'></i></button>
                      <button class="btn btn-secondary" type="reset">Cancelar <i
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
      <!--MODAL PROVEEDOR -->
      <!-- Modal -->
      <div class="modal fade" id="modalProv" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form class="g-3 needs-validation" action="Controlador/NuevoC.php" method="POST" autocomplete="off">
            <input type="hidden" value="Guardar1" name="bandera">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Proveedor</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="col-md-6">
                  <label for="inputCity" class="form-label">Nombre:</label>
                  <input type="text" class="form-control" id="" name="nombreProv">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-secondary" data-coreui-dismiss="modal">Cancelar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!--////////////////////////////////////////-->
      <!--MODAL CATEGORIA-->
      <!-- Modal -->
      <div class="modal fade" id="modalCate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form class="g-3 needs-validation" action="Controlador/NuevoC.php" method="POST" autocomplete="off">
            <input type="hidden" value="Guardar2" name="bandera">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Categoria</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="col-md-6">
                  <label for="inputCity" class="form-label">Nombre:</label>
                  <input type="text" class="form-control" id="" name="nombreCate">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-secondary" data-coreui-dismiss="modal">Cancelar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!--////////////////////////////////////////-->
    </div>

    <!-- IMPORTAR ARCHIVO FOOTER-->
    <?php include("foot/foot.php"); ?>
    <!-- ////////////////////////-->
    <!-- IMPORTAR ARCHIVO SCRIPT-->
    <?php include("foot/script.php"); ?>
    <!-- ////////////////////////-->
    <script>
      function mostrarFormulario() {
        var formulario = document.getElementById("formulario");
        if (formulario.style.display === "block") {
          formulario.style.display = "none";
        } else {
          formulario.style.display = "block";
        }
      }

    </script>

  </div>
</body>

</html>
