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
                            <!-- if breadcrumb is single--><span>Mantenimientos: Prestamo</span>
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
                            <div class="card-header"><strong>Prestamo de Activo</strong></div>
                            <div class="card-body">
                                <!--INICIO FORM-->
                                <form class="g-3 needs-validation" novalidate="">
                                    <div class="row my-4">
                                        <!--INICIO-->
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Buscar por
                                                Codigo:</label>
                                            <input class="form-control" id="validationCustom02" type="text" required="">
                                        </div>
                                        <div class="col-md-4">
                                        <label class="form-label" for="validationCustom02">purbwe</label>
                                            <button class="btn btn-primary" type="submit">Buscar</button>
                                        </div>
                                    </div>
                                    <div class="row my-4">
                                        <div>
                                            <button class="btn btn-primary" type="submit">Buscar</button>
                                        </div>
                                    </div>
                                    <!--FIN-->
                                    <div class="row my-4">
                                            <div class="col-md-2">
                                                <label class="form-label" for="validationCustom01">Fecha:</label>
                                                <input class="form-control" id="validationCustom01" type="date"
                                                    required="">
                                            </div>
                                        </div>
                                    <div class="row my-4">
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Ubicación:</label>
                                            <input class="form-control" id="validationCustom02" type="text" required="">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Jefe Responsable:</label>
                                            <input class="form-control" id="validationCustom02" type="text" required="">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom04">Modelo</label>
                                            <select class="form-select" id="validationCustom04" required="">
                                                <option selected="" disabled="" value="">Choose...</option>
                                            </select>
                                            <div class="invalid-feedback">Please select a valid state.</div>
                                        </div>
                                    </div>
                                    <hr style="color: black; background-color: black; width:100%;" />
                                    <!--FIN-->
                                    <div class="row  my-4">
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Nombre:</label>
                                            <input class="form-control" id="validationCustom02" type="text" required="">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Marca:</label>
                                            <input class="form-control" id="validationCustom02" type="text" required="">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Color:</label>
                                            <input class="form-control" id="validationCustom02" type="text" required="">
                                        </div>
                                        <div class="row  my-4">
                                            <div class="col-md-4">
                                                <label class="form-label" for="validationCustom04">Categoria: </label>
                                                <select class="form-select" id="validationCustom04" required="">
                                                    <option selected="" disabled="" value="">Choose...</option>
                                                </select>
                                                <div class="invalid-feedback">Please select a valid state.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="color: black; background-color: black; width:100%;" />
                                    <!--FIN-->
                                    <div class="row  my-4">
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom04">Tipo de Cargo: </label>
                                            <select class="form-select" id="validationCustom04" required="">
                                                <option selected="" disabled="" value="">Choose...</option>
                                                <option selected="" disabled="" value="">Nuevo</option>
                                                <option selected="" disabled="" value="">Donado</option>
                                            </select>
                                            <div class="invalid-feedback">Please select a valid state.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Codigo:</label>
                                            <input class="form-control" id="validationCustom02" type="text" required="">
                                        </div><br>
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Encargado del
                                                Bien:</label>
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