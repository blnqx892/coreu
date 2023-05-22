<!DOCTYPE html>
<html lang="en">
<!-- IMPORTAR ARCHIVO CABECERA-->
<?php include("head/head.php"); ?>
<!-- ////////////////////////-->

<body>
<?php
    $conexion=mysqli_connect('localhost','root', '', 'sicafi');
    $sql="SELECT * from ingreso_entradas order by nombre_adquisicion ASC";
    $nombre = mysqli_query($conexion, $sql) or die("No se puedo ejecutar la consulta"); 
?>
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
              <span>Adquisiciones</span>
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
              <div class="card-header"><strong>Tabla de Adquisiciones</strong></div>
              <div class="card-body">
                <div align="right">
                <button type="button" class="btn btn-secondary rounded-pill" title="PDF">Reporte <i class="far fa-file-pdf"></i></button>
                </div><br>
                <!-- dataTable-->
                <table id="miTabla" class="display" style="width:100%" cellpadding="0" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="text-align:center;">Nombre</th>
                      <th style="text-align:center;">N° Factura</th>
                      <th style="text-align:center;">Marca</th>
                      <th style="text-align:center;">Categoria</th>
                      <th style="text-align:center;">Fecha</th>
                      <th style="text-align:center;">Acción</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center;">
                  <?php While($mostrar=mysqli_fetch_assoc($nombre)){?>
                                    <?php if($mostrar['id'] != 28){ ?>
                    <tr>
                      <td><?php echo $mostrar['nombre_adquisicion'] ?></td>
                      <td><?php echo $mostrar['numero_factura'] ?></td>
                      <td><?php echo $mostrar['marca'] ?></td>
                      <td><?php 
                              $aux = $mostrar['fk_categoria'];
                              $sql1 = "SELECT categoria FROM categorias where id = '$aux'";
                              $cate = mysqli_query($conexion, $sql1) or die("No se puedo ejecutar la consulta");
                              $cate = mysqli_fetch_array($cate);
                              echo $cate['categoria']; 
                          ?>
                      </td>
                      <td><?php $fechaCom = explode("-",$mostrar['fecha_adquisicion']);
                                $fechaCom = $fechaCom[2].'/'.$fechaCom[1].'/'.$fechaCom[0];
                                          echo $fechaCom ?>
                      </td>
                      <td><button type="button" class="btn btn-info rounded-pill" title="Ver"><i
                            class='far fa-eye'></i></button>
                        <button type="button" class="btn btn-warning rounded-pill" title="Codificar"><i
                            class="	fas fa-barcode"></i></button>
                      </td>
                    </tr>
                  <?php } }?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th style="text-align:center;">Nombre</th>
                      <th style="text-align:center;">N° Factura</th>
                      <th style="text-align:center;">Marca</th>
                      <th style="text-align:center;">Categoria</th>
                      <th style="text-align:center;">Fecha</th>
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
      </div>
      <!-- ///////FIN CONTENEDOR/////////////-->
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
