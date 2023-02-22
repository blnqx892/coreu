<!DOCTYPE html>
<html lang="en">
<!-- IMPORTAR ARCHIVO CABECERA-->
<?php include("head/head.php"); ?>
<!-- ////////////////////////-->

<body>
  <!-- IMPORTAR ARCHIVO MENU VERTICAL-->
  <?php include("menu/sidebar.php"); ?>
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
              <!-- if breadcrumb is single--><span>INICIO</span>
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
                <form class="g-3 needs-validation" novalidate=""><!--INICIO SECCION FECHA-->
                <div class="row" >  
                    <div class="col-md-4">
                      <label for="inputEmail4" class="form-label">Fecha de Adquisición:</label>
                      <input type="date" class="form-control" id="inputEmail4">
                    </div> 
                </div> <!--FIN SECCION FECHA-->
              <div class="row  my-4">  <!--INICIO SECCION DOS-->
                    <div class="col-md-4">
                      <label for="inputEmail4" class="form-label">N° de Factura:</label>
                      <input type="text" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-4">
                      <label for="inputPassword4" class="form-label">Proveedor:</label>
                      <input type="text" class="form-control" id="inputPassword4">
                    </div>
                    <div class="col-md-4">
                      <label for="inputAddress2" class="form-label">Garantía:</label>
                      <input type="text" class="form-control" id="inputAddress2" placeholder="1 año">
                    </div>
                    </div><!--FIN SECCION DOS-->
              <div class="row  my-4"><!--INICIO SECCION TRES-->
                    <div class="col-md-4">
                      <label for="inputCity" class="form-label">Nombre:</label>
                      <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="col-md-4">
                      <label for="inputZip" class="form-label">Costo de Adquisición:</label>
                      <input type="text" class="form-control" id="inputZip">
                    </div>
                    <div class="col-md-4">
                      <label for="inputZip" class="form-label">Cantidad:</label>
                      <input type="number" class="form-control" id="inputZip">
                    </div>
              </div><!--FIN SECCION TRES-->
              <div class="row  my-4"><!--INICIO SECCION CUATRO-->
                    <div class="col-md-4">
                      <label for="inputZip" class="form-label">Marca:</label>
                      <input type="text" class="form-control" id="inputZip">
                    </div>
                    <div class="col-md-4">
                      <label for="inputZip" class="form-label">Modelo:</label>
                      <input type="text" class="form-control" id="inputZip">
                    </div>
                    <div class="col-md-4">
                      <label for="inputZip" class="form-label">Color:</label>
                      <input type="text" class="form-control" id="inputZip">
                    </div>
              </div><!--FIN SECCION CUATRO-->  
              <div class="row  my-4"><!--INICIO SECCION CINCO-->
                    <div class="col-md-4">
                       <label class="form-label" for="validationCustom04">Categoria</label>
                       <select class="form-select" id="validationCustom04" required="">
                          <option selected="" disabled="" value="">Equipo Tecnologico</option>
                          <option selected="" disabled="" value="">Equipo de Oficina</option>
                          <option selected="" disabled="" value="">Equipo de Maquinaria y Transporte</option>
                          <option selected="" disabled="" value="">Equipo de Herramientas</option>
                          <option selected="" disabled="" value="">Equipo Intangible</option>
                       </select>
                       <div class="invalid-feedback">Please select a valid state.</div>
                    </div>
              </div><!--FIN SECCION CUATRO--> 
                     <div class="col-12">
                       <button class="btn btn-primary" type="submit">Guardar</button>
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