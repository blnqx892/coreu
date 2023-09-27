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
              <span>Usuarios del Sistema</span>
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
            <div class="card mb-3">
              <div class="card-header"><strong>Ingreso de Datos</strong></div>
              <div class="card-body">
                <!--INICIO FORM-->
                <form id="form" class="g-3 needs-validation" role="form" action="" method="POST"
                  autocomplete="off">
                  <input type="hidden" value="Guardar" name="bandera">
                  <!--FIN SECCION DOS-->
                  <div class="row  my-3">
                    <!--INICIO SECCION TRES-->
                    <div class="col-md-3">
                      <label for="inputAddress2" class="form-label">Nombre:</label>
                      <input type="text" class="form-control" id="nombreC" placeholder="" name="nombreC" >
                    </div>
                    <div class="col-md-3">
                      <label for="inputZip" class="form-label">Apellido:</label>
                      <input type="text" class="form-control" id="apellidoC" name="apellidoC">
                    </div>
                    <div class="col-md-3">
                      <label for="inputZip" class="form-label">Usuario:</label>
                      <input type="text" class="form-control" id="usuarioC" name="usuarioC">
                    </div>
                    <div class="col-md-3">
                        <label for="inputCity" class="form-label">Email:</label>
                        <input type="e-mail" class="form-control" id="emailC" name="emailC">
                      </div>
                     </div>
                    <!--FIN SECCION TRES-->
                    <div class="row  my-3">
                      <!--INICIO SECCION CUATRO-->
                      <div class="col-md-3">
                      <label class="form-label" for="validationCustom04">Rol</label>
                      <select class="form-select" id="rolC" name="rolC" data-placeholder="Seleccione el Rol">
                        <option  value="Administrador">Administrador</option>
                        <option  value="Jefe">Jefe</option>
                      </select>
                      <div class="invalid-feedback">Please select a valid state.</div>
                     </div>
                     <div class="col-md-3">
                      <label class="form-label" for="validationCustom04">Permisos</label>
                      <select class="form-select" id="perC" name="perC" data-placeholder="Seleccione Producto">
                        <option  value="Almacen">Almacen</option>
                        <option  value="Activo Fijo">Activo Fijo</option>
                        <option  value="UACI">UACI</option>
                      </select>
                      <div class="invalid-feedback">Please select a valid state.</div>
                     </div>
                    <div class="col-md-3">
                      <label class="form-label" for="validationCustom04">Unidad:</label>
                      <select class="form-select" id="unidad_id" name="rolCU" data-placeholder="Seleccione la Unidad">
                      </select>
                      <div class="invalid-feedback">Please select a valid state.</div>
                     </div>
                   <div class="col-md-3">
                        <label for="inputZip" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="contraC" name="contraC">
                        <div id="error1"></div>
                      </div>
                    </div>
                    <div class="row my-3">
                    <div class="col-md-3">
                        <label for="inputZip" class="form-label">Repetir Contraseña:</label>
                        <input type="password" class="form-control" id="contraC1" name="contraC1">
                        <div id="error2"></div>
                      </div>
                    </div>
                    <!--FIN SECCION CUATRO-->
                    <div class="col-15" align="right">
                      <hr style="color: black; background-color: black; width:100%;" />
                      <button class="btn btn-success" type="submit" id="GuardaUsuarios" name="btnGuardar">Guardar <i class='far fa-check-square'></i></button>
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
    </div>
    <script src="./Controlador/Usuarios/usuario.js"></script>
    <script src="./Controlador/CredencialesA/credenciales.js"></script>
    <!-- IMPORTAR ARCHIVO FOOTER-->
    <?php include("foot/foot.php"); ?>
    <!-- IMPORTAR ARCHIVO SCRIPT-->
    <?php include("foot/script.php"); ?>
    <!-- ////////////////////////-->
  </div>

  <!-- SCRIPT QUE VALIDA SI LAS CONTRASEÑAS SON IGUALES-->
  <script>
      $(document).ready(function(){
            $("#contraC1").on("keyup",function(){
                if($("#contraC1").val() == $("#contraC").val()){
                    $("#contraC1").addClass("border border-success").removeClass("border border-danger");
                }else{
                    $("#contraC1").addClass("border border-danger").removeClass("border border-success");
                }
            })
        })
    </script>
</body>

</html>
