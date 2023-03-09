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
              <!-- if breadcrumb is single--><span>Credenciales</span>
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
              <div class="card-header"><strong>Credenciales Unidades</strong></div>
              <div class="card-body">
                <div class="col-md-14" align="right">
                  <label for="inputCity" class="form-label">Nueva Credencial</label>
                  <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#exampleModal" data-coreui-whatever="@mdo">Ir</button>
                </div>
                <div class="row  my-4">
                  <table class="table">
                    <thead class="table-dark">
                      <tr>
                        <th>Jefe Unidad</th>
                        <th>Unidad</th>
                        <th>Usuario</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>1</th>
                        <th>0003</th>
                        <th>08/03/2023</th>
                        <th>
                          <button type="button" class="btn btn-danger rounded-pill"><svg class="icon me-2">
                              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash">
                              </use>
                            </svg> Eliminar</button>
                          <button type="button" class="btn btn-danger rounded-pill"><svg class="icon me-2">
                              <use xlink:href="vendors/@coreui/icons/svg/free.svg#fi fi-rr-eye">
                              </use>
                            </svg> Ver</button>
                        </th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row-->
      </div>
    </div>
    <!-- ///////FIN CONTENEDOR/////////////-->
    <!-- Scrollable modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card-body">
                <!--INICIO FORM-->
                <form class="g-3 needs-validation" novalidate="">
                  <!--FIN SECCION DOS-->
                  <div class="row  my-4">
                    <!--INICIO SECCION TRES-->
                    <div class="col-md-4">
                      <label for="inputAddress2" class="form-label">Nombre de Unidad:</label>
                      <input type="text" class="form-control" id="inputAddress2" placeholder="">
                    </div>
                    <div class="col-md-4">
                      <label for="inputZip" class="form-label">Jefe de Unidad:</label>
                      <input type="text" class="form-control" id="inputZip">
                    </div>
                    <div class="col-md-2">
                      <label for="inputZip" class="form-label">No. de Empleados:</label>
                      <input type="number" class="form-control" id="inputZip">
                    </div>
                    <!--FIN SECCION TRES-->
                    <div class="row  my-4">
                      <!--INICIO SECCION CUATRO-->
                      <div class="col-md-3">
                        <label for="inputCity" class="form-label">Usuario:</label>
                        <input type="number" class="form-control" id="inputCity">
                      </div>
                      <div class="col-md-3">
                        <label for="inputZip" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="inputZip">
                      </div>
                      <div class="col-md-3">
                        <label for="inputZip" class="form-label">Repetir Contraseña:</label>
                        <input type="password" class="form-control" id="inputZip">
                      </div>
                    </div>
                    <!--FIN SECCION CUATRO-->
                    <div class="col-15" align="right">
                      <hr style="color: black; background-color: black; width:100%;" />
                      <button class="btn btn-primary" type="submit">Guardar</button>
                      <button class="btn btn-danger" type="submit">Cancelar</button>
                    </div>
                </form>
                <!--/// FIN FORM ////////////////-->
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
    <!-- IMPORTAR ARCHIVO FOOTER-->
    <?php include("foot/foot.php"); ?>
    <!-- ////////////////////////-->
  </div>
  <!-- IMPORTAR ARCHIVO SCRIPT-->
  <?php include("foot/script.php"); ?>
  <!-- ////////////////////////-->
  </div>
</body>

</html>
