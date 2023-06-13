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
              <span>Control de Usuarios</span>
            </li>
            <li class="breadcrumb-item active">
              <span>Actualización</span>
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
              <div class="card-header"><strong>Actualizacion Usuarios</strong></div>
              <div class="card-body">
                <!-- dataTable-->
                <table id="miTablaUsuarios" class="display" style="width:100%" cellpadding="0" cellspacing="0">
                  <thead>
                    <tr>
                    <th style="text-align:center;">N°</th>
                      <th style="text-align:center;">Nombre</th>
                      <th style="text-align:center;">Apellido</th>
                      <th style="text-align:center;">Usuario</th>
                      <th style="text-align:center;">Estado</th>
                      <th style="text-align:center;">Acción</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center;">
                    

              <!--MODAL VER USUARIO -->
      <!-- Modal -->
      <div class="modal fade" id="modalVer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Información de Usuario</h5>
            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="row my-4">
                <div class="col-md-4">
                  <label for="inputZip" class="form-label">Nombre:</label>
                  <input type="text" class="form-control" id="nombrev">
                </div>
                <div class="col-md-4">
                  <label for="inputZip" class="form-label">Apellido:</label>
                  <input type="text" class="form-control" id="apellidov">
                </div>
                <div class="col-md-4">
                  <label for="inputZip" class="form-label">Usuario:</label>
                  <input type="text" class="form-control" id="usuariov">
                </div>
              </div>
              <div class="row my-4">
              <div class="col-md-4">
                  <label for="inputZip" class="form-label">Rol:</label>
                  <input type="text" class="form-control" id="rolv">
                </div>
              <div class="col-md-4">
                  <label for="inputZip" class="form-label">Email:</label>
                  <input type="text" class="form-control" id="emailv">
                </div><div class="col-md-4">
                  <label for="inputZip" class="form-label">Contraseña:</label>
                  <input type="password" class="form-control" id="conv">
                </div><div class="col-md-4">
                  <label for="inputZip" class="form-label">Repetir Contraseña:</label>
                  <input type="password" class="form-control" id="con1v">
                </div>
              </div>
              <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Cerrar</button>
          </div>
            </form>
          </div>   
        </div>
      </div>
    </div>
      <!--////////////////////////////////////////-->

      <!--MODAL EDITAR USUARIO -->
      <!-- Modal -->
      <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modificar Datos de Usuario</h5>
            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form id="form" class="g-3 needs-validation" role="form" action="" method="POST"
                  autocomplete="off">
              <div class="row my-4">
                <div class="col-md-4">
                <input type="hidden" class="form-control" id="_id">
                  <label for="inputZip" class="form-label">Nombre:</label>
                  <input type="text" class="form-control" id="nombre">
                </div>
                <div class="col-md-4">
                  <label for="inputZip" class="form-label">Apellido:</label>
                  <input type="text" class="form-control" id="apellido">
                </div>
                <div class="col-md-4">
                  <label for="inputZip" class="form-label">Usuario:</label>
                  <input type="text" class="form-control" id="usuario">
                </div>
              </div>
              <div class="row my-4">
              <div class="col-md-4">
                      <label class="form-label" for="validationCustom04">Rol</label>
                      <select class="form-select" id="rolC" name="rolC" data-placeholder="Seleccione Producto">
                        <option  value="Almacen">AAlmacen</option>
                        <option  value="Activo Fijo">AAFijo</option>
                      </select>
                      <div class="invalid-feedback">Please select a valid state.</div>
                    </div>
              <div class="col-md-4">
                  <label for="inputZip" class="form-label">Email:</label>
                  <input type="text" class="form-control" id="email">
                </div><div class="col-md-4">
                  <label for="inputZip" class="form-label">Contraseña:</label>
                  <input type="password" class="form-control" id="con">
                </div><div class="col-md-4">
                  <label for="inputZip" class="form-label">Repetir Contraseña:</label>
                  <input type="password" class="form-control" id="contra1">
                </div>
              </div>
              <div class="modal-footer"> 
              <button class="btn btn-success" type="submit" id="edit" name="btnGuardar" >Guardar</button>
              <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Cancelar</button>
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
      <!--////////////////////////////////////////-->

                  </tbody>
                  <tfoot>
                    <tr>
                    <th style="text-align:center;">N°</th>
                    <th style="text-align:center;">Nombre</th>
                      <th style="text-align:center;">Apellido</th>
                      <th style="text-align:center;">Usuario</th>
                      <th style="text-align:center;">Estado</th>
                      <th style="text-align:center;">Acción</th>
                    </tr>
                  </tfoot>
                </table>
                <!-- //dataTable-->
              </div>
            </div>
          </div>
          <!-- /.row-->
        </div>
        <!-- ///////FIN CONTENEDOR/////////////-->
      </div>
    </div>
    <script src="./Controlador/Usuarios/mostrarusu.js"></script>
    <script src="./Controlador/Usuarios/usuario.js"></script>
      <!-- IMPORTAR ARCHIVO FOOTER-->
      <?php include("foot/foot.php"); ?>
      <!-- ////////////////////////-->
      <!-- IMPORTAR ARCHIVO SCRIPT-->
      <?php include("foot/script.php"); ?>
      <!-- ////////////////////////-->
    </div>
</body>

</html>
