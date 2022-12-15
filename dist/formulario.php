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
              <div class="card-header"><strong>Formulario</strong></div>
              <div class="card-body">
                <!--INICIO FORM-->
                <form class="row g-3 needs-validation" novalidate="">
                  <div class="col-md-4">
                    <label class="form-label" for="validationCustom01">First name</label>
                    <input class="form-control" id="validationCustom01" type="text"  required="">
                    <div class="valid-feedback">Looks good!</div>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label" for="validationCustom02">Last name</label>
                    <input class="form-control" id="validationCustom02" type="text"  required="">
                    <div class="valid-feedback">Looks good!</div>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label" for="validationCustomUsername">Username</label>
                    <div class="input-group has-validation"><span class="input-group-text"
                        id="inputGroupPrepend">@</span>
                      <input class="form-control" id="validationCustomUsername" type="text"
                        aria-describedby="inputGroupPrepend" required="">
                      <div class="invalid-feedback">Please choose a username.</div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label" for="validationCustom03">City</label>
                    <input class="form-control" id="validationCustom03" type="text" required="">
                    <div class="invalid-feedback">Please provide a valid city.</div>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label" for="validationCustom04">State</label>
                    <select class="form-select" id="validationCustom04" required="">
                      <option selected="" disabled="" value="">Choose...</option>
                      <option selected="" disabled="" value="">NATALIA</option>
                    </select>
                    <div class="invalid-feedback">Please select a valid state.</div>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label" for="validationCustom05">Zip</label>
                    <input class="form-control" id="validationCustom05" type="text" required="">
                    <div class="invalid-feedback">Please provide a valid zip.</div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                  </div>
                </form>
                <!--/// FIN FORM ////////////////-->
              </div>
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