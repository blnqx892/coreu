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
              <!-- if breadcrumb is single--><span>Suministros</span>
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
              <div class="card-body">
                <!-- /.tabla--><br>
                <div class="table-responsive">
                  <table class="table border mb-0">
                    <thead class="table-light fw-semibold">
                      <tr class="align-middle">
                        <th class="text-center">
                          <svg class="icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                          </svg>
                        </th>
                        <th>Usuario</th>
                        <th class="text-center">Country</th>
                        <th>Requisic</th>
                        <th class="text-center">Payment Method</th>
                        <th>Activity</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="align-middle">
                        <td class="text-center">
                          <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/4.jpg"
                              alt="user@email.com"><span class="avatar-status bg-secondary"></span></div>
                        </td>
                        <td>
                          <div>Enéas Kwadwo</div>
                          <div class="small text-medium-emphasis"><span>New</span> | Registered: Jan 1, 2020</div>
                        </td>
                        <td class="text-center">
                          <svg class="icon icon-xl">
                            <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-fr"></use>
                          </svg>
                        </td>
                        <td>
                          <div class="clearfix">
                            <div class="float-start">
                              <div class="fw-semibold">98%</div>
                            </div>
                            <div class="float-end"><small class="text-medium-emphasis">Jun 11, 2020 - Jul 10,
                                2020</small></div>
                          </div>
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 98%" aria-valuenow="98"
                              aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </td>
                        <td class="text-center">
                          <svg class="icon icon-xl">
                            <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-paypal"></use>
                          </svg>
                        </td>
                        <td>
                          <div class="small text-medium-emphasis">Last login</div>
                          <div class="fw-semibold">Last month</div>
                        </td>
                        <td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.tabla-->
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
