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
    <!-- CONTENEDOR---------------------------------------------------->
    <div class="body flex-grow-1 px-3">
    <div class="container-lg">
        <!-- row-->
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header"><strong>Asignación de Activo</strong></div>
                    <div class="card-body">
                        <!--INICIO FORM-->
                        <form id="form" class="g-3 needs-validation" role="form" action="" method="POST"
                        autocomplete="off">
                            <!--INICIO------------------------------------------------------------------------------->
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom01">Fecha Asignación:</label>
                                    <input class="form-control" id="fechaA" type="date" required="">
                                </div>
                            </div>
                            <!--FIN-->
                            <div class="row  my-4">
                                <div class="col-md-4">
                                    <input type="hidden" class="form-control" id="_id" value="<?php echo $_GET['a'];?>">
                                    <label class="form-label" for="validationCustom02">Nombre:</label>
                                    <input class="form-control" id="nombreA" type="text" required=""  disabled>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom02">Marca:</label>
                                    <input type="text" class="form-control" id="marcaA" name="marcaC" required=""
                                    disabled>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom02">Color:</label>
                                    <input type="text" class="form-control" id="colorA" name="colorC" required=""
                                    disabled>
                                </div>
                            </div>
                                <div class="row  my-4">
                                    <div class="col-md-4">
                                        <label class="form-label" for="validationCustom02">Serie:</label>
                                        <input type="text" class="form-control" id="serieA" name="serieC" required=""
                                        disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="validationCustom04">Categoria: </label>
                                        <select class="form-select" required="" id="categoria_id" name="categoria_id"
                                        disabled >
                                            <option selected value="">Choose...</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a valid state.</div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="validationCustom04">Modelo</label>
                                        <input class="form-control" id="modeloA" type="text" required=""  disabled>
                                    </div>
                                </div>
                            <hr style="color: black; background-color: black; width:100%;" />
                            <!--FIN----------------------------------------------------------------------->
                            <div class="row  my-4">
                                <div class="col-md-4">
                                    <!--combo qque vas a ir a guardar en fk_usuarios de ahi solo vas a guardar los campos que estas complentando-->
                                    <label class="form-label" for="validationCustom02">Jefe Responsable:</label>
                                    <select class="form-select" id="nombreC" name="rolCU" data-placeholder="Seleccione la Unidad">
                                    </select>
                                    <div class="invalid-feedback">Please select a valid state.</div>
                                </div>
                                <div class="col-md-4">                                    
                                    <label class="form-label" id="ubicacion">Ubicación:</label>
                                    <input for="#ubicacion" id="ubicacion_value" name="ubicacion_value" class="form-control" disabled></input>                                    
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom02">Codigo:</label>
                                    <input type="" class="form-control" id="codigoA" type="text" required="">
                                </div><br>
                                <div class="row  my-4">
                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom02">Encargado del Bien:</label>
                                    <input class="form-control" id="encargadoA" type="text" required="">
                                </div>
                            </div>
                            </div>
                            <hr style="color: black; background-color: black; width:100%;" />
                            <!--FIN-->
                            <div class="col-12" align="right">
                                <button class="btn btn-success" type="submit" id="GuardaCodificacion" name="btnGuardar">Guardar <i
                                        class='far fa-check-square'></i></button>
                                <button class="btn btn-secondary" type="reset">Cancelar <i
                                        class='far fa-times-circle'></i></button>
                            </div>
                        </form>
                        <!--/// FIN FORM ////////////////-->
                    </div>
                </div>
            </div>
            <!-- /.row------------------------------------------>
        </div>
    </div>
    <!-- ///////FIN CONTENEDOR/////////////-->
</div>
    <script src="./Controlador/codificacionAF/codificacion.js"></script>
    <script src="./Controlador/CredencialesA/credenciales.js" type="text/javascript"></script>
    <script src="./Controlador/Categorias/categoria.js" type="text/javascript"></script>
    <script type="text/javascript">
        var id = $("#_id").val();
    </script>
    <script src="./Controlador/CodificacionAF/mostrar_camposformulario.js" type="text/javascript"></script>
    <!-- IMPORTAR ARCHIVO FOOTER-->
    <?php include("foot/foot.php"); ?>
    <!-- IMPORTAR ARCHIVO SCRIPT-->
    <?php include("foot/script.php"); ?>
    <!-- ////////////////////////-->
</body>

</html>