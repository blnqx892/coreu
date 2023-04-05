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
              <span>Unidad y Restricción</span>
            </li>
            <li class="breadcrumb-item active">
              <span>Credenciales</span>
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
                  <button type="button" class="btn btn-primary" data-coreui-toggle="modal"
                    data-coreui-target="#exampleModal" data-coreui-whatever="@mdo">Ir</button>
                </div>
                <div class="row  my-4">
                  <!-- dataTable-->
                <table id="example" class="display" style="width:100%" cellpadding="0" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="text-align:center;">Jefe Unidad</th>
                      <th style="text-align:center;">Unidad</th>
                      <th style="text-align:center;">Usuario</th>
                      <th style="text-align:center;">Correo</th>
                      <th style="text-align:center;">Acción</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center;">
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>RRHH</td>
                      <td>ramirez</td>
                      <td>ram@gmail.com</td>
                      <td>
                      <button type="button" class="btn btn-info rounded-pill" title="Ver"><i class='far fa-eye'></i></button>
                            <button type="button" class="btn btn-warning rounded-pill" title="Editar"><i class="far fa-edit"></i></button>
                            <button type="button" class="btn btn-success rounded-pill" title="Alta"><i class="fa-solid fa-arrow-up-long"></i></button>
                            <button type="button" class="btn btn-danger rounded-pill" title="Baja"><i class="fa-solid fa-arrow-down-long"></i></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>Pedro Vargas</td>
                      <td>Medio Ambiente</td>
                      <td>vargas</td>
                      <td>vargs@gmail.com</td>
                      <td>
                            <button type="button" class="btn btn-info rounded-pill" title="Ver"><i class='far fa-eye'></i></button>
                            <button type="button" class="btn btn-warning rounded-pill" title="Editar"><i class="far fa-edit"></i></button>
                            <button type="button" class="btn btn-success rounded-pill" title="Alta"><i class="fa-solid fa-arrow-up-long"></i></button>
                            <button type="button" class="btn btn-danger rounded-pill" title="Baja"><i class="fa-solid fa-arrow-down-long"></i></i></button>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                    <th style="text-align:center;">Jefe Unidad</th>
                      <th style="text-align:center;">Unidad</th>
                      <th style="text-align:center;">Usuario</th>
                      <th style="text-align:center;">Correo</th>
                      <th style="text-align:center;">Acción</th>
                    </tr>
                  </tfoot>
                </table>
                <!-- //dataTable-->
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
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registro de Unidad</h5>
            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="row my-4">
                <div class="col-md-4">
                  <label for="inputZip" class="form-label">Jefe de Unidad:</label>
                  <input type="text" class="form-control" id="inputZip">
                </div>
                <div class="col-md-4">
                  <label for="inputZip" class="form-label">Unidad:</label>
                  <input type="text" class="form-control" id="inputZip">
                </div>
                <div class="col-md-4">
                  <label for="inputZip" class="form-label">Correo:</label>
                  <input type="text" class="form-control" id="inputZip">
                </div>
              </div>
              <div class="row my-4">
              <div class="col-md-4">
                  <label for="inputZip" class="form-label">Usuario:</label>
                  <input type="text" class="form-control" id="inputZip">
                </div><div class="col-md-4">
                  <label for="inputZip" class="form-label">Contraseña:</label>
                  <input type="password" class="form-control" id="inputZip">
                </div><div class="col-md-4">
                  <label for="inputZip" class="form-label">Repetir Contraseña:</label>
                  <input type="password" class="form-control" id="inputZip">
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- IMPORTAR ARCHIVO FOOTER-->
  <?php include("foot/foot.php"); ?>
  <!-- ////////////////////////-->
  <!-- IMPORTAR ARCHIVO SCRIPT-->
  <?php include("foot/script.php"); ?>
  <!-- ////////////////////////-->
  </div>
</body>

</html>
