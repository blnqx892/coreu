<!DOCTYPE html>
<html lang="en">
<!-- IMPORTAR ARCHIVO CABECERA-->
<?php include("head/head.php"); ?>
<!-- ////////////////////////-->
<script src="js/JsBarcode.all.min.js"></script>
<script src="Controlador/Suministros/suministro_index.js"></script>
<?php
    $categoria = '';
    // Identificar si se ha seteado la variable get categoria
    if (isset($_GET["categoria"])) {
      // Identificar si la variable get categoria lleva un valor o va nula
      if (!empty($_GET["categoria"])) {
        $categoria = $_GET["categoria"];
      }
    }
    $conexion=mysqli_connect('localhost','root', '', 'sicafi');

    $has_categoria = intval($categoria) != 0;

    $sql= $has_categoria ?
      "SELECT i_s.*, c.categoria from ingreso_suministros as i_s left join categorias as c on i_s.categoria_id = c.id where categoria_id = ".$categoria." order by nombre_suministro ASC" :
      "SELECT i_s.*, c.categoria from ingreso_suministros as i_s left join categorias as c on i_s.categoria_id = c.id order by nombre_suministro ASC";

    $nombre = mysqli_query($conexion, $sql) or die("No se puedo ejecutar la consulta");

    $sql_categorias = "select * from categorias order by categoria";
    $categorias = mysqli_query($conexion, $sql_categorias);
?>
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
              <span>Suministros</span>
            </li>
            <li class="breadcrumb-item">
              <span>Catálogo de Suministros</span>
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
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <div class="my-auto">
                    <strong>Suministros</strong>
                  </div>
                  <div>
                    <a class="btn btn-primary" href="AIngresoSuministros.php">Nuevo <i class='far fa-plus'></i></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="d-flex w-100 justify-content-center">
                    <label for="cats" class="me-2">Categorias</label>
                    <div class="input-group mb-3">
                      <select name="cats" id="cats_s" class="form-select-sm">
                        <option value="">Todas</option>
                        <?php while($cat = mysqli_fetch_assoc($categorias)) {?>
                          <?php if ($cat["id"] == $categoria):?>
                            <option value="<?php echo $cat["id"]?>" selected="selected"><?php echo $cat["categoria"]?></option>
                          <?php else:?>
                            <option value="<?php echo $cat["id"]?>"><?php echo $cat["categoria"]?></option>
                          <?php endif;?>
                        <?php }?>
                      </select>
                      <button type="button" class="btn btn-sm btn-primary" id="cats_b">Filtrar</button>
                    </div>

                  </div>
                </div>
                <!-- dataTable-->
                <table id="miTabla" class="display" style="width:100%" cellpadding="0" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th style="text-align:center;">Codigo de barra</th>
                      <th style="text-align:center;">Nombre de Suministro</th>
                      <th style="text-align:center;">Presentación</th>
                      <th style="text-align:center;">Unidad de medida</th>
                      <th style="text-align:center;">Ubicación</th>
                      <th style="text-align:center;">Categoría</th>
                      <th style="text-align:center;">Acción</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center;">
                  <?php $correlativo = 1?>
                    <?php While($mostrar=mysqli_fetch_assoc($nombre)){?>
                    <?php if($mostrar['id'] != 28){ ?>
                    <tr>
                      <td><?php echo $correlativo?></td>
                      <td><?php echo $mostrar['codigo_barra'] ?></td>
                      <td><?php echo $mostrar['nombre_suministro'] ?></td>
                      <td><?php echo $mostrar['presentacion'] ?></td>
                      <td><?php echo $mostrar['unidad_medida'] ?></td>
                      <td><?php echo $mostrar['estante'].'-'.$mostrar['entrepaño'].'-'.$mostrar['casilla'] ?></td>
                      <td><?php echo $mostrar['categoria'] ?></td>
                      <td>
                        <a href="<?php echo 'ShowSuministro.php?id='.$mostrar['id']?>" class="btn btn-info rounded-pill" title="Ver"><i
                            class='far fa-eye'></i></a>
                        <a href="<?php echo 'AIngresoSuministros.php?id='.$mostrar['id']?>" class="btn btn-warning rounded-pill" title="Editar"><i
                            class="far fa-edit"></i></a>
                        <button type="button" class="btn btn-success rounded-pill" title="Alta"><i
                            class="fa-solid fa-arrow-up-long"></i></button>
                        <button type="button" class="btn btn-danger rounded-pill" title="Baja"><i
                            class="fa-solid fa-arrow-down-long"></i></i></button>
                      </td>
                    </tr>
                        <?php $correlativo++?>
                    <?php } }?>
                  </tbody>
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
    <script src="js/utils.js"></script>


</body>

</html>
