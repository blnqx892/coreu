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
                <form class="g-3 needs-validation" action="Controlador/prueba.php" method="POST"
                  autocomplete="off">
                  <input type="hidden" value="GuardarIngreso" name="bandera">
                  <!--INICIO SECCION FECHA-->
                  <!--FIN SECCION FECHA-->
                  <div class="row  my-4">
                    <!--INICIO SECCION DOS-->
                    <div class="col-md-4">
                      <label for="inputEmail4" class="form-label">Nombre:</label>
                      <input type="text" class="form-control" id="" name="nombre">
                    </div>
                    <div class="col-md-4">
                      <label for="inputPassword4" class="form-label">Edad:</label>
                      <input type="number" class="form-control" id="" name="edad">
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
      <!--MODAL CATEGORIA-->
      <!-- Button trigger modal -->
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Categoria</h5>
              <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="col-md-6">
                <label for="inputCity" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="inputCity">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
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
        if (formulario.style.display === "none") {
          formulario.style.display = "block";
        } else {
          formulario.style.display = "none";
        }
      }

    </script>

  </div>
</body>

</html>
