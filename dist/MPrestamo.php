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
                            <!-- if breadcrumb is single--><span>Movimiento de Bienes Muebles</span>
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
                            <div class="card-header"><strong>Movimiento de Bienes Muebles</strong></div>
                            <div class="card-body">
                                <!--INICIO FORM-->
                                <form class="g-3 needs-validation" novalidate="">
                                    <div class="row my-4">
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Buscar por
                                                Codigo:</label>
                                            <input class="form-control" id="validationCustom02" type="text" required="">
                                        </div>
                                        <div class="col-md-4">
                                            <button class="btn btn-primary" type="submit">Buscar</button>
                                        </div>
                                    </div>
                                    <hr style="color: black; background-color: black; width:100%;" />
                                    <div class="row my-4">
                                        <div class="col-md-2">
                                            <label class="form-label" for="validationCustom01">Fecha:</label>
                                            <input class="form-control" id="validationCustom01" type="date" required="">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for="validationCustom02">Procedencia:</label>
                                            <input class="form-control" id="validationCustom02" type="text" required="">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for="validationCustom02">Destino:</label>
                                            <input class="form-control" id="validationCustom02" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="row my-6">
                                        <div class="col-md-6">
                                            <label class="form-label" for="validationCustom02">Obervaciones:</label>
                                            <textarea class="form-control" id="validationCustom02" required="" row="3">
                                            </textarea>
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label" for="validationCustom02">Tipo de Movimiento:</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Prestamo
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Traslado Definitivo
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Reparación
                                            </label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row my-2 ">
                                        
                                    </div>
                                    <hr style="color: black; background-color: black; width:100%;" />
                                    <!--FIN-->
                                    <h4>Caracteristicas</h4>
                                    <hr style="color: black; background-color: black; width:100%;" />
                                    <div class="row my-4">
                                    <div class="col-md-3">
                                            <label class="form-label" for="validationCustom02">Nombre:</label>
                                            <input class="form-control" id="validationCustom02" type="text" required="">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for="validationCustom02">Descripcion:</label>
                                            <input class="form-control" id="validationCustom02" type="text" required="">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for="validationCustom02">Modelo:</label>
                                            <input class="form-control" id="validationCustom02" type="text" required="">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for="validationCustom02">Serie:</label>
                                            <input class="form-control" id="validationCustom02" type="text" required="">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for="validationCustom02">Marca:</label>
                                            <input class="form-control" id="validationCustom02" type="text" required="">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for="validationCustom02">Codigo:</label>
                                            <input class="form-control" id="validationCustom02" type="text" required="">
                                        </div>
                                    </div>
                                    <hr style="color: black; background-color: black; width:100%;" />
                                    <!--FIN-->
                                    <div class="col-12" align="right">
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                        <button class="btn btn-danger" type="submit">Cancelar</button>
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