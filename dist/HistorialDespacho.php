<?php // Iniciamos la sesión
session_start();
if (isset($_SESSION['usuarioActivo'])) {
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <!-- IMPORTAR ARCHIVO CABECERA-->
  <?php include("head/head.php"); ?>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <body>
  <!-- IMPORTAR ARCHIVO MENU VERTICAL-->
  <?php include("menu/verti.php"); ?>
  <!-- ////////////////////////-->
  <div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <header class="header header-sticky mb-4">
      <!-- IMPORTAR ARCHIVO MENU HORIZONTAL-->
      <?php include("menu/hori.php"); ?>
      <!-- ////////////////////////-->
      <div class="header-divider"></div>
      <div class="container-fluid">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
              <a href="index.php">
                <svg class="icon me-2">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-home">
                  </use>
                </svg>
              </a>
            </li>
            <li class="breadcrumb-item">
              <span>Requisiciones</span>
            </li>
            <li class="breadcrumb-item">
              <span>Historial</span>
            </li>
          </ol>
        </nav>
      </div>
    </header>
    <!-- CONTENEDOR-->
    <div class="body flex-grow-1 px-3">
      <?php
      $usuario = $_SESSION['usuarioActivo'];
      $conexion = mysqli_connect('localhost', 'root', '', 'sicafi');
      if ($usuario['rol'] == 'UCP') {
        $sql_requision = "select r.*, e.nombre_estado, e.codigo as codigo_estado, u.nombre_unidad from requisicion_suministro as r inner join unidades as u on u.id = r.unidad_id inner join estado_requisicion as e on e.id = r.estado_id where e.codigo != 'pendiente.aprobacion'";
      } else if ($usuario['rol'] == 'Almacen') {
        $sql_requision = "select r.*, e.nombre_estado, e.codigo as codigo_estado, u.nombre_unidad from requisicion_suministro as r inner join unidades as u on u.id = r.unidad_id inner join estado_requisicion as e on e.id = r.estado_id where e.codigo = 'finalizado'";
      } else if ($usuario['rol'] == 'Unidad'){
        $sql_requision = "select r.*, e.nombre_estado, e.codigo as codigo_estado, u.nombre_unidad from requisicion_suministro as r inner join unidades as u on u.id = r.unidad_id inner join estado_requisicion as e on e.id = r.estado_id where r.unidad_id =".$usuario['fk_unidades'];
      } else {
        die("No posee permisos para esta pantalla");
      }
      $requisiciones = mysqli_query($conexion, $sql_requision) or die("No se puede ejecutar la consulta");

      // Evaluar si es posible realizar una nueva requisición
      $dia_actual = date('d');
      $mes_actual = date('m');
      $anio_actual = date('Y');

      $sql_total_requisiciones = "select * from requisicion_suministro r where month(r.fecha_requisicion) = ".$mes_actual.' and year(r.fecha_requisicion) = '.$anio_actual.' and r.unidad_id = '.$usuario['fk_unidades'];
      $total_requisiciones = mysqli_query($conexion, $sql_total_requisiciones);

      $count = 0;

      while ($item = mysqli_fetch_array($total_requisiciones)) {
        $count++;
      }
      ?>
      <div class="container-lg">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <div class="my-auto">
                    <strong>Historial de Despachos</strong>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table id="miTabla" class="table table-sm">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Código</th>
                    <th>Fecha de Pedido</th>
                    <th>Unidad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $correlativo = 1;?>
                  <?php while ($requisicion = mysqli_fetch_array($requisiciones)):
                    //FORMATO FECHA
                        $fechaMySQL = $requisicion['fecha_requisicion'];
                        $timestamp = strtotime($fechaMySQL);
                        $fechaFormateada = date("d-m-Y", $timestamp);
                    ?>

                    <tr>
                      <td><?php echo $correlativo?></td>
                      <td><?php echo $requisicion["id"]?></td>
                      <td><?php echo $fechaFormateada ?></td>
                      <td><?php echo $requisicion["nombre_unidad"]?></td>
                      <td><?php echo $requisicion["nombre_estado"]?></td>
                      <td>
                        <button class="btn btn-light rounded-pill" type="button" data-coreui-toggle="modal"
                                data-coreui-target="#modalAgg" title="Ver" onclick="show_n(<?php echo $requisicion['id']?>, '<?php echo $requisicion['codigo_estado']?>')">
                          <i class="fas fa-eye" style="color:#2E96B0"></i>
                        </button>
                        <a class="btn btn-light rounded-pill" title="Reporte" href="Reportes/reporte3.php?id=<?php echo $requisicion['id']?>" target="_blank"><i class='fas fa-file-pdf'  style="color:#2E96B0"></i></a>
                      </td>

                    </tr>
                    <?php $correlativo++;?>
                  <?php endwhile;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modalAgg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nueva requisición de suministros</h5>
              <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row my-4">
                <div class="col-md-6">
                  <?php
                  $fecha_actual = date("Y-m-d"); // fecha actual, value con min el cual evita seleccionar fechas anteriores
                  ?>
                  <label for="inputEmail4" class="form-label">Fecha de pedido:</label>
                  <input type="date" class="form-control v-required-2" value="<?php echo $fecha_actual; ?>"
                         min="<?php echo $fecha_actual; ?>" id="fechaP" name="fechaP">
                </div>
                <div class="col-md-6">
                  <?php
                  $sql_unidades = "select * from unidades order by nombre_unidad";
                  $unidades = mysqli_query($conexion, $sql_unidades);
                  ?>
                  <label class="form-label" for="validationCustom04">Unidad: </label>
                  <select class="form-select v-required-2" required="" id="unidad" name="unidad" disabled="disabled">
                    <?php while ($unidad = mysqli_fetch_array($unidades)):?>
                      <?php if ($unidad['id'] == $usuario['fk_unidades']):?>
                        <option value="<?php echo $unidad['id']?>" selected="selected"><?php echo $unidad['nombre_unidad']?></option>
                      <?php else:?>
                        <option value="<?php echo $unidad['id']?>"><?php echo $unidad['nombre_unidad']?></option>
                      <?php endif;?>
                    <?php endwhile;?>
                  </select>
                </div>
              </div>
              <div class="row my-4">
                <div class="col-12">
                  <button class="btn btn-sm btn-primary" id="add_sumi" type="button">
                    Agregar suministro <i class='far fa-plus'></i>
                  </button>
                </div>
              </div>
              <hr class="my2">
              <div class="row">
                <div class="col-12" id="req_show" style="display: none">
                  <div class="row">
                    <div class="col-6 text-center">
                      <strong>Suministro</strong>
                    </div>
                    <div class="col-6">
                      <div class="row">
                        <div class="col-12 text-center">
                          <strong>Cantidad</strong>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6 text-center">
                          <strong>
                            Solicitada
                          </strong>
                        </div>
                        <div class="col-6 text-center">
                          <strong>
                            Aprobada
                          </strong>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr class="my-2">
                  <div id="body_req_show"></div>
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="save_req" class="btn btn-primary">Guardar</button>
              <button type="reset" class="btn btn-secondary" data-coreui-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- ///////FIN CONTENEDOR/////////////-->
    </div>

    <div class="toast-container position-fixed end-0 p-3">
      <div id="liveToast" class="toast text-bg-success " role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <div class="rounded me-2"></div>
          <strong class="me-auto" id="toast_title">Acción exitosa</strong>
          <button type="button" class="btn-close" data-coreui-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="toast_body">
          Registro guardado
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
  <script src="Controlador/Requisiciones/requisiciones.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
  </html>
  <?php
}else{
  ?>
  <!DOCTYPE HTML>
  <html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="refresh" content="0;URL=/coreu/dist/Acceso.php">
  </head>

  <body>
  </body>

  </html>
  <?php
}
?>
