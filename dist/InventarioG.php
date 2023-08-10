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
              <span>Inventario General</span>
            </li>
            <li class="breadcrumb-item active">
              <span>Inventario</span>
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
              <div class="card-header"><strong>Inventario General</strong></div>
              <div class="card-body">
                <center>
                    <div class="col-md-3">
                      <select class="form-select" required="" id="cargoC" name="cargoC">
                        <option selected="" disabled="" value="">Elegir Categoría de Inventario</option>
                        <option value="Comprado">Mobiliraio de Oficina</option>
                        <option value="Donado">Equipo Tecnológico</option>
                        <option value="Donado">Mayor a 600</option>
                      </select>
                      <div class="invalid-feedback">Please select a valid state.</div>
                    </div>
                </center>
                <!-- dataTable-->
                <table id="inven" class="display" style="width:100%" cellpadding="0" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="text-align:center;">N°</th>
                      <th style="text-align:center;">Fecha</th>
                      <th style="text-align:center;">Codigo</th>
                      <th style="text-align:center;">Nombre</th>
                      <th style="text-align:center;">Categoria</th>      
                      <th style="text-align:center;">Ubicación</th>
                      <th style="text-align:center;">Acción</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center;">
                  </tbody>
                  <tfoot>
                    <tr>
                      <th style="text-align:center;">N°</th>
                      <th style="text-align:center;">Fecha</th>
                      <th style="text-align:center;">Codigo</th>
                      <th style="text-align:center;">Nombre</th>
                      <th style="text-align:center;">Categoria</th>      
                      <th style="text-align:center;">Ubicación</th>
                      <th style="text-align:center;">Acción</th>
                    </tr>
                  </tfoot>
                </table>
 <!--------------------------- //dataTable-------------------------------------------------------------------->
 <!--MODAL VER USUARIO -->
 <div class="modal fade" id="modalVera" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">INFORMACIÓN
          DE ACTIVOS</h5>
        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row my-4">
            <div class="col-md-4">
              <label for="inputZip" class="form-label">Fecha:</label>
              <input type="text" class="form-control" id="fechaa" disabled>
            </div>
            <div class="col-md-4">
              <label for="inputZip" class="form-label">Código:</label>
              <input type="text" class="form-control" id="codigoa" disabled>
            </div>
            <div class="col-md-4">
              <label for="inputZip" class="form-label">N° Fatura:</label>
              <input type="text" class="form-control" id="factua" disabled>
            </div>
          </div>
          <div class="row my-4">
            <div class="col-md-4">
              <label for="inputZip" class="form-label">Valor de Adquisición:</label>
              <input type="text" class="form-control" id="costa" disabled>
            </div>
            <div class="col-md-4">
              <label for="inputZip" class="form-label">Proveedor:</label>
              <input type="text" class="form-control" id="id_proveedor" disabled>
            </div>
            <div class="col-md-4">
              <label for="inputZip" class="form-label">Decripción del bien:</label>
              <input type="text" class="form-control" id="nombrea" disabled>
            </div>
          </div>
          <div class="row my-4">
            <div class="col-md-4">
              <label for="inputZip" class="form-label">Modelo:</label>
              <input type="text" class="form-control" id="modeloa" disabled>
            </div>
            <div class="col-md-4">
              <label for="inputZip" class="form-label">Ubicación:</label>
              <input type="text" class="form-control" id="ubicaciona" disabled>
            </div>
            <div class="col-md-4">
              <label for="inputZip" class="form-label">Marca:</label>
              <input type="text" class="form-control" id="marcaa" disabled>
            </div>
          </div>
          <div class="row my-4">
            <div class="col-md-4">
              <label for="inputZip" class="form-label">Tipo Cargo:</label>
              <input type="text" class="form-control" id="cargoa" disabled>
            </div>
            <div class="col-md-4">
              <label for="inputZip" class="form-label">Vida Util:</label>
              <input type="text" class="form-control" id="vidaa" disabled>
            </div>
            <div class="col-md-4">
              <label for="inputZip" class="form-label">Categoria:</label>
              <input type="text" class="form-control" id="id_categoria" disabled>
            </div>
          </div>
<!----------------------------------este es el div de lo de vehiculo  ----------------------------------------->
         <div class="row my-4" id="ocultarverdatos" style="display:none">
            <div class="col-md-4">
              <label for="inputZip" class="form-label">No. Motor:</label>
              <input type="text" class="form-control" id="motora" disabled>
            </div>
            <div class="col-md-4">
              <label for="inputZip" class="form-label">No. Placa:</label>
              <input type="text" class="form-control" id="placaa" disabled>
            </div>
            <div class="col-md-4">
              <label for="inputZip" class="form-label">No. Chasis:</label>
              <input type="text" class="form-control" id="chasisa" disabled>
            </div>
            <div class="col-md-4">
                <label for="inputZip" class="form-label">Capacidad:</label>
                <input type="text" class="form-control" id="capaa" disabled>
            </div>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Cerrar</button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!--///////////////TERMINA MODAL VER ///////////////////////////////////////////////////////////////-->
              </div>
            </div>
          </div>
          <!-- /.row-->
        </div>
      
      <!-- ///////FIN CONTENEDOR/////////////-->
    </div>
    </div>
    <script src="./Controlador/InventarioAF/mostrartablain.js"></script>
    <script src="./Controlador/Proveedores/proveedor.js"></script>
    <script src="./Controlador/Categorias/categoria.js"></script>
    <!-- IMPORTAR ARCHIVO FOOTER-->
    <?php include("foot/foot.php"); ?>
    <!-- IMPORTAR ARCHIVO SCRIPT-->
    <?php include("foot/script.php"); ?>
    <!-- ////////////////////////-->
  </div>
</body>

</html>
